<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    public $timestamps = false;

    //defines all the fields in the table that the controller needs to interact with.
    public $fillable = ['firstName', 'lastName','email', 'dateOfBirth', 'contactNumber', 'dateEmployed', 'hometown', 'password'];
    //Hides the password to secure it.
    public $hidden = [ 'password'];
}
