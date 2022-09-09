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
            $table->integer('user_id')->foreign('users.user_id');
            $table->integer('seniority');
            $table->date('join_date');
            $table->integer('max_day_off');
            $table->integer('day_off');
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
