<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrekScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prek_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_profile_id');
            $table->integer('k_level_id');
            $table->integer('k_subject_id');
            $table->decimal('quarter_1', 6,2)->nullable();
            $table->decimal('quarter_2', 6,2)->nullable();
            $table->decimal('semester_1', 6,2)->nullable();
            $table->decimal('quarter_3', 6,2)->nullable();
            $table->decimal('quarter_4', 6,2)->nullable();
            $table->decimal('semester_2', 6,2)->nullable();
            $table->decimal('yearly', 6,2)->nullable();
        
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
        Schema::dropIfExists('prek_scores');
    }
}
