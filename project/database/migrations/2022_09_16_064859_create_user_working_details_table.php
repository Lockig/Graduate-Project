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
        Schema::create('user_working_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('user_id')->on('users');
            $table->date('join_date');
            $table->integer('max_day_off')->default('0');
            $table->integer('seniority');
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
        Schema::dropIfExists('user_working_details');
    }
};
