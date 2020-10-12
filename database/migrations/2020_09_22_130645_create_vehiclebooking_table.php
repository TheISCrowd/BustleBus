<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclebookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiclebookings', function (Blueprint $table) {
            $table->foreignID('bookingID');
            $table->foreign('bookingID')->references('bookingID')->on('bookings');
            $table->string('registrationNumber');
            $table->foreign('registrationNumber')->references('registrationNumber')->on('vehicles');
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
