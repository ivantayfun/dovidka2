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

        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('equipment');
            $table->integer('rack_id')->unsigned();
            $table->foreign('rack_id')->references('id')->on('racks');
            $table->integer('cable_id')->unsigned();
            $table->foreign('cable_id')->references('id')->on('cables');

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
        Schema::dropIfExists('equipments');
    }
};
