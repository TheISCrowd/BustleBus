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
        Schema::create('vehiclebooking', function (Blueprint $table) {
            $table->foreignID('bookingID');
            $table->foreign('bookingID')->references('bookingID')->on('booking');
            $table->string('registrationNumber');
            $table->foreign('registrationNumber')->references('registrationNumber')->on('vehicle');
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
