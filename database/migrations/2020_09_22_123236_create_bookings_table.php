<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('bookingID');
            $table->date('startDate')->nullable();
            $table->date('time')->nullable();
            $table->integer('infants')->nullable();
            $table->integer('children')->nullable();
            $table->integer('adults')->nullable();
            $table->integer('elderly')->nullable();
            $table->string('disabled')->nullable();
            $table->string('babychair')->nullable();
            $table->string('roofracks')->nullable();
            $table->string('trailer')->nullable();
            $table->string('extra')->nullable();
            $table->string('vehicleType')->default('No');
            $table->string('initalCollectionPoint')->nullable();
            $table->string('dropOff')->nullable();
            $table->string('complete')->nullable();
            $table->foreignID('clientID')->nullable();
            $table->foreign('clientID')->references('id')->on('users')->nullable();
            $table->foreignID('driverID')->nullable();
            $table->foreign('driverID')->references('driverID')->on('drivers')->nullable();
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
