<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_records', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('exam_number');
            $table->string('place_of_exam');
            $table->date('date_exam');
            $table->string('exam_council');
            $table->string('qualification_number');
            $table->string('archive_number');
            $table->string('place_of_issue');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('admission_records');
    }
}
