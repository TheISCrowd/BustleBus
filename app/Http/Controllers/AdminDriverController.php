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

    // this is the post function to add a new driver into the data base
    // look at the createAdmin/create Hr function for the how to or look at the laravel documents 
    public function createNewDriver(Request $request) {
        
    //Needs to be completed
    echo "<h1>This is the post method</h1>";
    }
}
