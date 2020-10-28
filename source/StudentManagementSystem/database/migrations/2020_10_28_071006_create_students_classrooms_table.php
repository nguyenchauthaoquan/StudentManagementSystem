<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_classrooms', function (Blueprint $table) {
            $table->string('id_student');
            $table->string('id_classroom');
            $table->foreign('id_student')->references('id')->on('students');
            $table->foreign('id_classroom')->references('id')->on('classrooms');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_classrooms');
    }
}
