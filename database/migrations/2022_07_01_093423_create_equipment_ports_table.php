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
        Schema::create('equipment_ports', function (Blueprint $table) {
            $table->id();
            $table->integer('eq_port_pos');
            $table->integer('equipment_id')->unsigned();
            $table->foreign('equipment_id')->references('id')->on('equipments');
            $table->integer('phone')->unsigned();
            $table->foreign('phone')->references('phone')->on('phones');
            $table->integer('cable_pos')->unsigned();
            $table->foreign('cable_pos')->references('cable_pos')->on('cablepairs');
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
        Schema::dropIfExists('equipment_ports');
    }
};
