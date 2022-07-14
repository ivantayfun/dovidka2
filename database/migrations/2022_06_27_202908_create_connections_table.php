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
        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->integer('inblock_id');
            $table->foreign('inblock_id')->references('id')->on('blocks');
            $table->integer('inport_id');
            $table->foreign('inport_id')->references('port_pos')->on('ports');
            $table->integer('outblock_id');
            $table->foreign('outblock_id')->references('id')->on('blocks');
            $table->integer('outport_id');
            $table->foreign('outport_id')->references('port_pos')->on('ports');
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
        Schema::dropIfExists('connections');
    }
};
