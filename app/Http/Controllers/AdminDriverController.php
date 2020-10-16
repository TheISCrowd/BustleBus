<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use PhpParser\Node\Stmt\TryCatch;

class AdminDriverController extends Controller
{
    // this is the get function to display the view
    public function showNewDriverForm() {
        return view('admin.driver.new-driver');
    }
    

    // this is the post function to add a new driver into the data base
    // look at the createAdmin/create Hr function for the how to or look at the laravel documents 
    public function createNewDriver(Request $request) 
    {  
    //Needs to be completed
        $this->validate($request,  [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:225'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'dateOfBirth'=>['required','date'],
            'contactNumber' => ['required', 'string', 'regex:/^(0)[0-9]{9}/i'],
            'dateEmployed'=> ['required','date'],
            'homeTown' => ['required','string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        echo "hello";
        $driver = Driver::create([
            'firstName' => $request['FirstName'],
            'lastName' => $request['lastName'],
            'email' => $request['email'],
            'dateOfBirth' => $request['dateOfBirth'],
            'contactNumber' => $request['contactNumber'],
            'dateEmployed' => $request['dateEmployed'],
            'hometown' => $request['hometown'],
            'password' => Hash::make($request['password']),
        ]); 
        return redirect()->intended('created-driver');  
    }
}
