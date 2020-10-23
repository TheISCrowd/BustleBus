<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driverlicense extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    public $fillable = ['driverID','licenseCode'];
}
