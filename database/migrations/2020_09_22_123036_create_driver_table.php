<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id('driverID');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->date('dateOfBirth');
            $table->string('contactNumber');
            $table->date('dateEmployed');
            $table->string('hometown');
            $table->string('password');
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
