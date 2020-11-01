<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_admission')->unsigned();
            $table->foreign('id_admission')
                ->references('id')->on('admission_records')
                ->cascadeOnDelete();
            $table->string('id_student');
            $table->foreign('id_student')
                ->references('id')->on('students')
                ->cascadeOnDelete();
            $table->integer('grade')->unique();
            $table->string('school');
            $table->double('GPA');
            $table->string('performance');
            $table->string('conduct');
            $table->string('province');
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
        Schema::dropIfExists('admission_details');
    }
}
