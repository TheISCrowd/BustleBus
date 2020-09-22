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
        Schema::create('driverlicense', function (Blueprint $table) {
            $table->foreignID('driverID');
            $table->foreign('driverID')->references('driverID')->on('driver');
            $table->string('licenseCode');
            $table->foreign('licenseCode')->references('licenseCode')->on('license');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driverlicense');
        Schema::dropIfExists('vehiclebooking');
        Schema::dropIfExists('vehicle');
        Schema::dropIfExists('license');
        Schema::dropIfExists('bed');
        Schema::dropIfExists('daytripdepot');
        Schema::dropIfExists('depot');
        Schema::dropIfExists('daytrip');
        Schema::dropIfExists('booking');
        Schema::dropIfExists('client');
        Schema::dropIfExists('driver');
    }
}
