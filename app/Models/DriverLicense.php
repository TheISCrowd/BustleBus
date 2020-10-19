<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driverlicense extends Model
{
    use HasFactory;

    public $timestamps = false;
    //derfines the fields to be interacted with from the license table.
    public $fillable = ['driverID','licenseCode'];

}