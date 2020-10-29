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
            $table->foreign('id_student')
                    ->references('id')->on('students')
                    ->cascadeOnDelete();
            $table->string('id_teacher')->unique()->nullable();
            $table->foreign('id_teacher')
                ->references('id')->on('teachers')
                ->cascadeOnDelete();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('gender', 10);
            $table->string('phone', 20);
            $table->date('birthday')->nullable();
            $table->string('origin')->nullable();
            $table->string('address')->nullable();
            $table->string('email');
            $table->bigInteger('identity_number')->nullable();
            $table->date('date_of_issue_identity_card')->nullable();
            $table->string('place_of_identity_card')->nullable();
            $table->json('background')->nullable();
            $table->json('policies')->nullable();
            $table->date('date_of_union')->nullable();
            $table->date('date_of_communist')->nullable();
            $table->string('talents')->nullable();
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
