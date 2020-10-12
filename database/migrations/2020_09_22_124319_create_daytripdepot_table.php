<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaytripdepotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daytripdepots', function (Blueprint $table) {
            $table->foreignId('tripNumber');
            $table->foreign('tripNumber')->references('tripNumber')->on('daytrips');
            $table->foreignId('startDestination');
            $table->foreign('startDestination')->references('depotID')->on('depots');
            $table->foreignId('endDestination');
            $table->foreign('endDestination')->references('depotID')->on('depots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // dropped in create_driverlicense_table
    }
}
