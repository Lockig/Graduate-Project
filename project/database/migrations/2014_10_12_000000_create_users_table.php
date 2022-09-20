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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('email')->unique();
            $table->string('mobile_number');
            $table->string('avatar');
            $table->foreignId('position_id')->references('position_id')->on('positions');
            $table->integer('fingerprint');
            $table->softDeletes();
//            $table->integer('fingerprint_id');
//            $table->tinyInteger('fingerprint_select')->default('0');
//            $table->unsignedTinyInteger('del_fingerprint_id');
//            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
