<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absent_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('absent_type');
            $table->integer('student_profile_id');
            $table->integer('grade_id');
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
        Schema::dropIfExists('absent_records');
    }
}
