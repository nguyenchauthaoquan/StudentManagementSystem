<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('id_student')->unique()->nullable();
            $table->string('id_teacher')->unique()->nullable();
            $table->foreign('id_student')
                ->references('id')->on('students')
                ->cascadeOnDelete();
            $table->foreign('id_teacher')
                ->references('id')->on('teachers')
                ->cascadeOnDelete();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('birthday');
            $table->string('place_of_birth');
            $table->string('origin');
            $table->string('gender',10);
            $table->string('address');
            $table->string('phone', 50);
            $table->string('race');
            $table->string('religion');
            $table->integer('id_card_number');
            $table->string('place_of_id_card');
            $table->string('nationality');
            $table->date('date_of_union');
            $table->date('date_of_communist');
            $table->string('talents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
