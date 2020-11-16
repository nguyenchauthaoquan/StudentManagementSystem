<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplines', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('id_student')->nullable();
            $table->string('id_teacher')->nullable();
            $table->foreign('id_student')
                ->references('id')->on('students')
                ->cascadeOnDelete();
            $table->foreign('id_teacher')
                ->references('id')->on('teachers')
                ->cascadeOnDelete();
            $table->string('announcement/decision');
            $table->string('reason');
            $table->string('semester');
            $table->date('signing');
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
        Schema::dropIfExists('disciplines');
    }
}
