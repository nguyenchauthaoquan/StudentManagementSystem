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
            $table->string('id')->primary();
            $table->string('id_group');
            $table->foreign('id_group')
                ->references('id')->on('groups')
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
            $table->string('religion')->nullable();
            $table->string('kin')->nullable();
            $table->string('id_number');
            $table->string('place_of_id_number');
            $table->string('nationality');
            $table->string('major');
            $table->string('talents')->nullable();
            $table->date('date_of_union')->nullable();
            $table->date('date_of_communist')->nullable();
            $table->date('date_of_student_union')->nullable();
            $table->date('date_of_dormitory')->nullable();
            $table->string('room_of_dormitory')->nullable();
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