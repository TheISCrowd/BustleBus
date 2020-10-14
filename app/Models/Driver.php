<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ['firstName', 'lastName', 'dateOfBirth', 'contactNumber', 'dateEmployed', 'hometown'];

    public $hidden = [ 'password'];
}
