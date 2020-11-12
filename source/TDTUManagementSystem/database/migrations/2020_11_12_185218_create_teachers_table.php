<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('id_faculty');
            $table->foreign('id_faculty')
                ->references('id')->on('faculties')
                ->cascadeOnDelete();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->date('birthday');
            $table->string('place_of_birth');
            $table->string('origin');
            $table->string('gender', 10);
            $table->string('phone', 50);
            $table->string('address');
            $table->string('email')->nullable();
            $table->string('academic_rank')->nullable();
            $table->string('degree')->nullable();
            $table->string('religion');
            $table->string('kin');
            $table->integer('id_number');
            $table->string('place_of_id_number');
            $table->string('nationality');
            $table->string('talents')->nullable();
            $table->date('date_of_union')->nullable();
            $table->date('date_of_communist')->nullable();
            $table->date('date_of_student_union')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}