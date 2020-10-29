<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedBigInteger('id_training');
            $table->foreign('id_training')
                ->references('id')->on('training_programs')
                ->cascadeOnDelete();
            $table->string('id_faculty')->unique();
            $table->foreign('id_faculty')
                ->references('id')->on('faculties')
                ->cascadeOnDelete();
            $table->bigInteger('intakes_course');
            $table->date('date_admission');
            $table->date('date_graduate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
}
