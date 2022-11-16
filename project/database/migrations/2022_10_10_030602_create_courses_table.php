<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id('course_id');
            $table->foreignId('teacher_id')->references('id')->on('users');
            $table->string('subject_id');
            $table->foreign('subject_id')->references('subject_id')->on('subjects');
            $table->string('course_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->float('course_hour');
            $table->string('course_description');
            $table->integer('course_status');
            $table->softDeletes();
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
        Schema::dropIfExists('courses');
    }
};
