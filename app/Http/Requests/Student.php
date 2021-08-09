<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Student extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dni' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'addressable' => 'required',
            'phoneable' => 'required',
            'date_birth' => 'required',
            'payment' => 'required',
            'enrollment' => 'required',
            'date_start' => 'required',
            'academic_degree_id' => 'required|not_in:0',
            'blood_type_id' => 'required|not_in:0',
        ];
    }
}
