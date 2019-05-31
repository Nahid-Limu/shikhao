<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shikhao_id',30);
            $table->integer('student_id')->index()->nullable();
            $table->integer('medium_id')->index()->nullable();
            $table->integer('curriculum_id')->index()->nullable();
            $table->integer('class_id')->index()->nullable();
            $table->double('salary');
            $table->boolean('can_travel')->nullable();
            $table->integer('location_id')->index()->nullable();
            $table->text('location_details')->nullable();
            $table->integer('preferred_school_id')->index()->nullable();
            $table->integer('preferred_university_id')->index()->nullable();
            $table->date('joining_date')->nullable();
            $table->tinyInteger('preferred_gender')->nullable();
            $table->text('special_requirement')->nullable();
            $table->tinyInteger('days_per_week')->nullable();
            $table->float('minimum_rating')->nullable();
            $table->boolean('multiple_student_status')->nullable();
            $table->tinyInteger('job_status')->nullable();
            $table->tinyInteger('created_by')->nullable();
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
        Schema::dropIfExists('job_post');
    }
}
