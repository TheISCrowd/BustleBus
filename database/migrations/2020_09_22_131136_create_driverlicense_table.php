<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverlicenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driverlicenses', function (Blueprint $table) {
            $table->foreignID('driverID');
            $table->foreign('driverID')->references('driverID')->on('drivers');
            $table->string('licenseCode');
            $table->foreign('licenseCode')->references('licenseCode')->on('licenses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driverlicenses');
        Schema::dropIfExists('vehiclebookings');
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('licenses');
        Schema::dropIfExists('beds');
        Schema::dropIfExists('daytripdepots');
        Schema::dropIfExists('depots');
        Schema::dropIfExists('daytrips');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('drivers');
    }
}
