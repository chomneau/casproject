<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecondaryAbsentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secondary_absents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('absent_id');
            $table->integer('student_profile_id');
            $table->integer('secondary_level_id');
            $table->text('reason');
            $table->Date('absent_date');
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
        Schema::dropIfExists('secondary_absents');
    }
}
