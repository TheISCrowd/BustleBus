<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id('bookingID');
            $table->date('startDate');
            $table->date('endDate');
            $table->integer('numberOfPassengers');
            $table->string('initalCollectionPoint');
            $table->foreignID('clientID');
            $table->foreign('clientID')->references('clientID')->on('client');
            $table->foreignID('driverID');
            $table->foreign('driverID')->references('driverID')->on('driver')->nullable();
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
