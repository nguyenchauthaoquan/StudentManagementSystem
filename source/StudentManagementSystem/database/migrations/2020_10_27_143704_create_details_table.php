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
            $table->foreign('id_student')->references('id')->on('students');
            $table->string('id_teacher')->unique()->nullable();
            $table->foreign('id_teacher')->references('id')->on('teachers');
            $table->string('gender');
            $table->string('phone');
            $table->date('birthday');
            $table->string('origin');
            $table->string('nationality');
            $table->string('address');
            $table->string('email');
            $table->bigInteger('identity_number');
            $table->date('date_of_identity');
            $table->string('identity_origin');
            $table->json('background');
            $table->json('policies');
            $table->date('date_of_union');
            $table->date('date_of_communist');
            $table->string('talents');
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
        Schema::dropIfExists('details');
    }
}
