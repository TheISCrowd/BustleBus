<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->string('registrationNumber')->primary();
            $table->date('dateOfPurchase');
            $table->string('make');
            $table->string('model');
            $table->date('year');
            $table->integer('capacity');
            $table->string('requiredLicenseCode');
            $table->foreign('requiredLicenseCode')->references('licenseCode')->on('licenses');
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
