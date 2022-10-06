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
        Schema::create('day_off_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->references('account_id')->on('accounts');
            $table->date('day_start');
            $table->date('day_end');
            $table->string('content');
            $table->string('stage');
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
        Schema::dropIfExists('day_off_requests');
    }
};
