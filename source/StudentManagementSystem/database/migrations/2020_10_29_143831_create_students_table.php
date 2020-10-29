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
            $table->string('id_faculty')->unique();
            $table->foreign('id_faculty')
                ->references('id')->on('faculties')
                ->cascadeOnDelete();
            $table->string('id_classroom');
            $table->foreign('id_classroom')
                ->references('id')->on('classrooms')
                ->cascadeOnDelete();
            $table->string('major');
            $table->json('admission_records');
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
