<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shikhao_id',30);
            $table->string('name')->nullable()->index();
            $table->string('guardian_name')->nullable();
            $table->string('contact_number')->nullable()->index();
            $table->string('password')->nullable();
            $table->string('additional_contact_number')->nullable();
            $table->integer('school_id')->index()->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('referral_code')->nullable();
            $table->string('verification_code')->nullable();
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
        Schema::dropIfExists('student');
    }
}
