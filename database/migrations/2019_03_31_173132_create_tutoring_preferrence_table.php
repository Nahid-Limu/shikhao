<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutoringPreferrenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutoring_preference', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tutor_id')->index();
            $table->integer('preferred_medium_id')->nullable()->index();
            $table->integer('preferred_curriculum_id')->nullable()->index();
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
        Schema::dropIfExists('tutoring_preference');
    }
}
