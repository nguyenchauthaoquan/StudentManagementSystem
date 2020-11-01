<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('id_student')->nullable();
            $table->string('id_teacher')->nullable();
            $table->foreign('id_student')
                ->references('id')->on('students')
                ->cascadeOnDelete();
            $table->foreign('id_teacher')
                ->references('id')->on('teachers')
                ->cascadeOnDelete();
            $table->string('fullname')->nullable();
            $table->string('relationship')->nullable();
            $table->date('birthday')->nullable();
            $table->string('phone')->nullable();
            $table->string('job')->nullable();
            $table->string('email')->nullable();
            $table->string('resident')->nullable();
            $table->string('workplace')->nullable();
            $table->string('incomes_source')->nullable();
            $table->text('description')->nullable();
            $table->string('career')->nullable();
            $table->string('place_of_work')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('backgrounds');
    }
}
