<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->string('id_student')->nullable();
            $table->string('id_teacher')->nullable();
            $table->foreign('id_student')
                ->references('id')->on('students')
                ->cascadeOnDelete();
            $table->foreign('id_teacher')
                ->references('id')->on('teachers')
                ->cascadeOnDelete();
            $table->string('area')->nullable();
            $table->bigInteger('military')->nullable();
            $table->year('volunteer')->nullable();

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
        Schema::dropIfExists('policies');
    }
}
