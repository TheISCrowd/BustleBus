<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Driverlicense;
use App\Models\Booking;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function getAllBookings()
    {
        return booking::all();
    }

    public function getAllDrivers()
    {
        return Driver::all();
    }

    public function getAllAdmin()
    {
        return Admin::all();
    }

    public function generateHrDashboard()
    {
        $admins = $this->getAllAdmin();
        $drivers = $this->getAllDrivers();
        return view('dashboard.dashboard', compact('admins', 'drivers'));
    }
    public function generateAdminDashboard()
    {
        $bookings = $this->getAllBookings();
        $drivers = $this->getAllDrivers();
        return view('dashboard.dashboard', compact('bookings', 'drivers'));
    }

    public function createNewDriver(Request $request)
    {
        //Validator for all data from the input form. *field name* => [Specifictations]
        $this->validate($request,  [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:225'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'dateOfBirth' => ['required', 'date'],
            'contactNumber' => ['required', 'string', 'regex:/^(0)[0-9]{9}/i'],
            'dateEmployed' => ['required', 'date'],
            'hometown' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        //calls the Dirver model to create a new driver field in the table.
        $driver = Driver::create([
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'email' => $request['email'],
            'dateOfBirth' => $request['dateOfBirth'],
            'contactNumber' => $request['contactNumber'],
            'dateEmployed' => $request['dateEmployed'],
            'hometown' => $request['hometown'],
            'password' => Hash::make($request['password']),
        ]);
        //calls the driverlicense model to create an new field that can be added to the diverlicenses table.
        $driverlicense = Driverlicense::create([
            'driverID' => DB::table('drivers')->where('email', $request['email'])->value('driverID'),
            'licenseCode' => $request['licenseCode'],
        ]);

        return redirect()->back();
    }
    
    public function updateDriver(Request $request){
        $this->validate($request,  [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:225'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'dateOfBirth'=>['required','date'],
            'contactNumber' => ['required', 'string', 'regex:/^(0)[0-9]{9}/i'],
            'dateEmployed'=> ['required','date'],
            'hometown' => ['required','string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        //calls the Dirver model to create a new driver field in the table.
        $driver = Driver::where('driverID',$request['driverID'])->update([
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'email' => $request['email'],
            'dateOfBirth' => $request['dateOfBirth'],
            'contactNumber' => $request['contactNumber'],
            'dateEmployed' => $request['dateEmployed'],
            'hometown' => $request['hometown'],
            'password' => Hash::make($request['password']),
        ]); 
        //calls the driverlicense model to create an new field that can be added to the diverlicenses table.
        $driverlicense = Driverlicense::where('driverID',$request['driverID'])->update(['licenseCode'=>$request['licenseCode']]);
            
        return redirect()->back();
    }

    public function updateAdmin(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $admin = Admin::where('adminID',$request['adminID'])->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return $this->generateHrDashboard();
    }
}
