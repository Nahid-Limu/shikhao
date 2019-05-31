<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shikhao_id',30)->index();
            $table->string('name',150)->index();
            $table->string('image')->nullable();
            $table->string('facebook_username')->nullable();
            $table->string('email',200);
            $table->string('password')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('contact_number',30)->index()->nullable();
            $table->text('permanent_address')->nullbale();
            $table->integer('service_area_id')->index()->nullable();
            $table->integer('location_id')->index()->nullable();
            $table->date('dob')->nullable();
            $table->string('nationalId',50)->nullable();
            $table->string('fathers_name',150)->nullable();
            $table->string('mothers_name',150)->nullable();
            $table->string('parents_number',30)->nullable();
            $table->tinyInteger('occupational_status_id')->index()->nullable();
            $table->integer('university_id')->index()->nullable();
            $table->integer('semester_year_id')->index()->nullable();
            $table->integer('department_id')->index()->nullable();
            $table->string('university_student_id',30)->nullable();
            $table->date('date_of_registration')->nullable();
            $table->tinyInteger('medium_id')->index()->nullable();
            $table->double('minimum_salary')->nullable();
            $table->tinyInteger('english_bangla_curriculum_id')->index()->nullable();
            $table->float('ssc_result')->nullable();
            $table->float('hsc_result')->nullable();
            $table->tinyInteger('school_id')->index()->nullable();
            $table->tinyInteger('number_days_week')->nullable();
            $table->boolean('is_verified');
            $table->date('verified_on')->nullable();
            $table->tinyInteger('account_status');
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('tutor');
    }
}
