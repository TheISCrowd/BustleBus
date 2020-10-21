<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // Remove time stamp colums
    public $timestamps = false;

    // use HasFactory;
    public $fillable = ['startDate', 'endDate', 'infants', 'children', 'adults', 'elderly', 'disabled', 'babychair', 'roofracks', 'trailer', 'extra', 'vehicleType', 'initalCollectionPoint', 'latLong', 'clientID', 'driverID'];
}
