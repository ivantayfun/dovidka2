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
        Schema::create('cablepairs', function (Blueprint $table) {
            $table->id();
            $table->integer('cable_id')->unsigned();
            $table->foreign('cable_id')->references('id')->on('cables');
            $table->integer('cable_pos');
            $table->integer('port_id')->unsigned();
            $table->foreign('port_id')->references('port_pos')->on('ports');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');

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
        Schema::dropIfExists('cablepairs');
    }
};
