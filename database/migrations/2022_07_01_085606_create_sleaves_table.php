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
        Schema::create('sleaves', function (Blueprint $table) {
            $table->id();
            $table->integer('incable_id');
            $table->foreign('incable_id')->references('id')->on('cables');
            $table->integer('inpair_id');
            $table->foreign('inpair_id')->references('cable_pos')->on('cablepairs');
            $table->integer('outcable_id');
            $table->foreign('outcable_id')->references('id')->on('cables');
            $table->integer('outpair_id');
            $table->foreign('outpair_id')->references('cable_pos')->on('cablepairs');
            $table->integer('customer_id');
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
        Schema::dropIfExists('sleaves');
    }
};
