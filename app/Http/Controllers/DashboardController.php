<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Driverlicense;
use App\Models\Booking;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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
        $clients = $this->getAllClients();
        
        return view('dashboard.dashboard', compact('bookings', 'drivers','clients'));
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
        $validator = Validator::make($request->all(),  [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:225'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'dateOfBirth'=>['required','date'],
            'contactNumber' => ['required', 'string', 'regex:/^(0)[0-9]{9}/i'],
            'dateEmployed'=> ['required','date'],
            'hometown' => ['required','string', 'max:255'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['updatefail' => 'The update failed! Click "Update" for more information.'])->withInput()->withErrors($validator);
        }

        //calls the Dirver model to create a new driver field in the table.
        $driver = Driver::where('driverID',$request['driverID'])->update([
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'email' => $request['email'],
            'dateOfBirth' => $request['dateOfBirth'],
            'contactNumber' => $request['contactNumber'],
            'dateEmployed' => $request['dateEmployed'],
            'hometown' => $request['hometown'],
            
        ]); 
        //calls the driverlicense model to create an new field that can be added to the diverlicenses table.
        $driverlicense = Driverlicense::where('driverID',$request['driverID'])->update(['licenseCode'=>$request['licenseCode']]);
            
        return redirect()->back()->with(['updatesuccess' => 'The update was successful!']);
    }

    public function updateAdmin(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['updatefail' => 'The update failed! Click "Update" for more information.'])->withInput()->withErrors($validator);
        }

        $admin = Admin::where('adminID',$request['adminID'])->update([
            'name' => $request['name'],
            'email' => $request['email'],
            
        ]);

        

        return redirect()->back()->with(['updatesuccess' => 'The update was successful!']);
    }

    public function updateClient(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'cell' => ['required', 'string', 'regex:/^(0)[0-9]{9}/i'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['updatefail' => 'The update failed! Click "Update" for more information.'])->withInput()->withErrors($validator);
        }

        $admin = User::where('id',$request['clientID'])->update([
            'name' => $request['name'],
            'surname' =>$request['surname'],
            'cell'=> $request['cell'],
            'email' => $request['email'],
            
        ]);
        return redirect()->back()->with(['updatesuccess' => 'The update was successful!']);
    }

    public function getAllClients()
    {
        return User::all();
    }

    public function deleteClient(Request $request)
    {
        $deletedRows = User::where('id',$request['clientID'])->delete();
        return redirect()->back()->with(['updatesuccess' => 'The deletion was successful!']);
    }

    public function deleteDriver(Request $request)
    {
        $deletedRows = Driverlicense::where('driverID',$request['driverID'])->delete();
        $deletedRows = Driver::where('driverID',$request['driverID'])->delete();
        return redirect()->back()->with(['deletesuccess' => 'The deletion was successful!']);
    }

    public function deleteAdmin(Request $request)
    {
        $deletedRows = Admin::where('adminID',$request['adminID'])->delete();
        return redirect()->back()->with(['deletesuccess' => 'The deletion was successful!']);
    }
}
