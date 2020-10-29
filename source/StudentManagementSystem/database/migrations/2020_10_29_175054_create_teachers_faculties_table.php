<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_faculties', function (Blueprint $table) {
            $table->string('id_teacher');
            $table->foreign('id_teacher')
                ->references('id')->on('teachers')
                ->cascadeOnDelete();
            $table->string('id_faculty');
            $table->foreign('id_faculty')
                ->references('id')->on('faculties')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers_faculties');
    }
}
