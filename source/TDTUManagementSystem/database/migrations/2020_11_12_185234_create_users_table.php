<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('id_student')->unique()->nullable();
            $table->foreign('id_student')
                ->references('id')
                ->on('students')
                ->cascadeOnDelete();
            $table->string('id_teacher')->unique()->nullable();
            $table->foreign('id_teacher')
                ->references('id')
                ->on('teachers')
                ->cascadeOnDelete();
            $table->string('account')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('status')->default('Cho Phép');
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
        Schema::dropIfExists('users');
    }
}
