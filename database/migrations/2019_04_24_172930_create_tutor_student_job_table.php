<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorStudentJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_student_job', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_post_id')->index()->nullable();
            $table->integer('student_id')->index()->nullable();
            $table->integer('tutor_id')->index()->nullable();
            $table->double('salary')->nullable();
            $table->date('started_on')->nullable();
            $table->float('tutor_rating')->nullable();
            $table->float('student_rating')->nullable();
            $table->tinyInteger('selection_method')->nullable();
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
        Schema::dropIfExists('tutor_student_job');
    }
}
