<?php

namespace App\Http\Controllers;

use App\Models\AcademicDegree;
use App\Models\Address;
use App\Models\Agent;
use App\Models\BloodType;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\Student as StudentRequest;
use App\Models\Phone;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $open = true;

    public function index()
    {
        $academic_degree = AcademicDegree::get();
        $blood_type = BloodType::get();
        return view('matricula.index',compact('academic_degree','blood_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */         
    public function store(StudentRequest $request)
    {   
        $apellido =  substr($request->post('last_name'), 0, 1);//extraer la primera letra del apellido para codigo
        $nombre = substr($request->post('name'), 0, 1);//extraer la primera letra del nombre para codigo
        $last_id = str_pad(Student::latest()->first()->id + 1, 4, "0", STR_PAD_LEFT);// ultimo id + 1
        $code = strtoupper("{$apellido}{$nombre}-{$last_id}");// generación de codigo

        //guardar estudiantes
        $student = Student::create([
            'name' => $request->post('name'),
            'last_name' => $request->post('last_name'),
            'date_birth' => $request->post('date_birth'),
            'payment' => $request->post('payment'),
            'enrollment'=> $request->post('enrollment'),
            'date_start' => $request->post('date_start'),
            'code' => $code,
            'dni' => $request->post('dni'),
            //foreign keys
            'academic_degree_id'=> $request->post('academic_degree_id'),
            'blood_type_id' => $request->post('blood_type_id'),
        ]);

        $student_id = Student::findOrFail($student->id);
        $this->saveAddress($student_id,$request->post('addressable'));
        $this->savePhone($student_id,$request->post('phoneable'));
        //guardar apoderados estudiantes
        $cont = 0;
            while ($cont < count($request->post('apoderado_name'))) {
                $agent = Agent::create([
                    'name' => $request->post('apoderado_name')[$cont],
                    'last_name'=>$request->post('apoderado_last_name')[$cont],
                ]);
                $agent_id = Agent::findOrFail($agent->id); 
                $this->saveAddress($agent_id,$request->post('direccion_name')[$cont]);
                $this->savePhone($agent_id,$request->post('telefono_name')[$cont]);
                //guardar en tabla pivote
                $student_id->agents()->attach($agent_id);
                $cont=$cont+1;
        }
        return redirect('matricula')->with('status', 'Estudiante Creado Correctamente!');
    }

    public function saveAddress($id, $address){
        $create_address = new Address([
            'address' => $address,
        ]);
        //Lo asigno y guardo en tabla polimorfica
        $id->addresses()->save($create_address);
    }
    
    public function savePhone($id, $phone){
        $create_phone = new Phone([
            'phone' => $phone,
        ]);
        //Lo asigno y guardo en tabla polimorfica
        $id->phones()->save($create_phone);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
