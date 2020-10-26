<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaytripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daytrips', function (Blueprint $table) {
            $table->id('tripNumber');
            $table->foreignId('bookingID')->nullable();
            $table->foreign('bookingID')->references('bookingID')->on('bookings')->nullable();
            $table->string('destinationsName')->nullable();
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
