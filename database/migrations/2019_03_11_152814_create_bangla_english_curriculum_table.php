<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanglaEnglishCurriculumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bangla_english_curriculum', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medium_id')->index();
            $table->string('curriculum_name','100')->nullable();
            $table->string('remarks')->nullable();
            $table->boolean('curriculum_status');
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
        Schema::dropIfExists('bangla_english_curriculum');
    }
}
