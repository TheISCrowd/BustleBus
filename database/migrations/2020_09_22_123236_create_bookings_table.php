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
            $table->date('startDate');
            $table->date('endDate');
            $table->integer('infants');
            $table->integer('children');
            $table->integer('adults');
            $table->integer('elderly');
            $table->boolean('disabled');
            $table->boolean('babychair');
            $table->boolean('roofrack');
            $table->boolean('trailer');
            $table->boolean('extra');
            $table->string('initalCollectionPoint');
            $table->foreignID('clientID');
            $table->foreign('clientID')->references('id')->on('users');
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
