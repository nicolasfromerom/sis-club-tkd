<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('last_name', 100);
            $table->date('date_birth');
            $table->float('payment', 10,2);
            $table->float('enrollment', 10,2);
            $table->date('date_start');
            $table->string('code',9);
            $table->string('dni',8);

            //foreign keys
            $table->unsignedBigInteger('academic_degree_id');
            $table->foreign('academic_degree_id')->references('id')->on('academic_degrees');

            $table->unsignedBigInteger('blood_type_id');
            $table->foreign('blood_type_id')->references('id')->on('blood_types');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
