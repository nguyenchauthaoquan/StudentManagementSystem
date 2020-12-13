<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorsSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('majors_subjects', function (Blueprint $table) {
            $table->string('id_major');
            $table->foreign('id_major')
                ->references('id')
                ->on('majors')
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
        Schema::dropIfExists('majors_subjects');
    }
}
