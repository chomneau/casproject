<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_profile_id');
            $table->integer('grade_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->decimal('quarter_1', 6,2)->nullable();
            $table->decimal('quarter_2', 6,2)->nullable();
            $table->decimal('quarter_3', 6,2)->nullable();
            $table->decimal('quarter_4', 6,2)->nullable();
//            $table->decimal('semester_1', 6,2)->nullable();
//            $table->decimal('semester_2', 6,2)->nullable();
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
        Schema::dropIfExists('scores');
    }
}
