<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class AdminDriverController extends Controller
{
    // this is the get function to display the view
    public function showNewDriverForm() {
        return view('admin.driver.new-driver');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:225'],
            'contactNumber' => ['required', 'string', 'regex:/^(0)[0-9]{9}/i'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    // this is the post function to add a new driver into the data base
    // look at the createAdmin/create Hr function for the how to or look at the laravel documents 
    public function createNewDriver(Request $request) 
    {  
    //Needs to be completed
        echo "<h1>This is the post method</h1>";
        
        return Driver::create([
            'firstName' => $data['FirstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'dateOfBirth' => $data['dateOfBirth'],
            'contactNumber' => $data['contactNumber'],
            'dateEmployed' => $data['dateEmployed'],
            'hometown' => $data['hometown'],
            'password' => Hash::make($data['password']),
        ]);
        
    }
}
