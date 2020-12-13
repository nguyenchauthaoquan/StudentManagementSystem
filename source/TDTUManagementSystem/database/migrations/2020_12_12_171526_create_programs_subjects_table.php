<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs_subjects', function (Blueprint $table) {
            $table->bigInteger('id_training')->unsigned();
            $table->foreign('id_training')
                ->references('id')
                ->on('training_programs')
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
        Schema::dropIfExists('programs_subjects');
    }
}
