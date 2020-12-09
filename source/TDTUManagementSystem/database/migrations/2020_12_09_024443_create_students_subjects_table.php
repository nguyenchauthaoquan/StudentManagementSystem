<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_subjects', function (Blueprint $table) {
            $table->id();
            $table->string('id_student');
            $table->foreign('id_student')
                ->references('id')
                ->on('students')
                ->cascadeOnDelete();
            $table->string('id_subject');
            $table->foreign('id_subject')
                ->references('id')
                ->on('subjects')
                ->cascadeOnDelete();
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
        Schema::dropIfExists('students_subjects');
    }
}
