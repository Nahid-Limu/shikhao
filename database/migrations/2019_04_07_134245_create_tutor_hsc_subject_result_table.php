<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorHscSubjectResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_hsc_subject_result', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tutor_id')->index();
            $table->integer('subject_id')->index()->nullable();
            $table->integer('grade_point_id')->index()->nullable();
            $table->integer('created_by')->index()->nullable();
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
        Schema::dropIfExists('tutor_hsc_subject_result');
    }
}
