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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer');
            $table->boolean('active');
            $table->integer('phone');
            $table->foreign('phone')->references('phone')->on('phones');
            $table->integer('cable_id')->unsigned();
            $table->foreign('cable_id')->references('id')->on('cables');
            $table->integer('pair_id')->unsigned();
            $table->foreign('pair_id')->references('cable_pos')->on('pairs');
            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms');
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
        Schema::dropIfExists('customers');
    }
};
