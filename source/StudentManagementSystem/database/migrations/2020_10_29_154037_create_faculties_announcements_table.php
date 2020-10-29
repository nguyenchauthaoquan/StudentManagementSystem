<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultiesAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculties_announcements', function (Blueprint $table) {
            $table->string('id_faculty');
            $table->foreign('id_faculty')
                    ->references('id')->on('faculties')
                    ->cascadeOnDelete();
            $table->unsignedBigInteger('id_announcement');
            $table->foreign('id_announcement')
                ->references('id')->on('announcements')
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
        Schema::dropIfExists('faculties_announcements');
    }
}