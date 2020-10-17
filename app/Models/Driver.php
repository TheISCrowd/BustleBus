<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ['firstName', 'lastName','email', 'dateOfBirth', 'contactNumber', 'dateEmployed', 'hometown', 'password'];

    public $hidden = [ 'password'];
}
