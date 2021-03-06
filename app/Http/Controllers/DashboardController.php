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
use Laravel\Ui\Presets\React;

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
        $modelData = [
            'firstName' => "",
            'lastName' => "",
            'email' => "",
            'dateOfBirth' => "",
            'contactNumber' => "",
            'dateEmployed' => "",
            'hometown' => ""
        ];

        $admins = $this->getAllAdmin();
        $drivers = $this->getAllDrivers();
        return view('dashboard.dashboard', compact('admins', 'drivers', 'modelData'));
    }
    public function generateAdminDashboard()
    {
        $modelData = [
            'firstName' => "",
            'lastName' => "",
            'email' => "",
            'dateOfBirth' => "",
            'contactNumber' => "",
            'dateEmployed' => "",
            'hometown' => ""
        ];

        $bookings = $this->getAllBookings();
        $drivers = $this->getAllDrivers();
        $clients = $this->getAllClients();

        return view('dashboard.dashboard', compact('bookings', 'drivers', 'clients', 'modelData'));
    }

    public function createNewDriver(Request $request)
    {
        //Validator for all data from the input form. *field name* => [Specifictations]
        $data = [
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'email' => $request['email'],
            'dateOfBirth' => $request['dateOfBirth'],
            'contactNumber' => $request['contactNumber'],
            'dateEmployed' => $request['dateEmployed'],
            'hometown' => $request['hometown']
        ];

        $validator = Validator::make($request->all(),  [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:225'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:drivers'],
            'dateOfBirth' => ['required', 'date'],
            'contactNumber' => ['required', 'string', 'regex:/^(0)[0-9]{9}/i'],
            'dateEmployed' => ['required', 'date'],
            'hometown' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['successdriver' => 'The Driver was not created! Click "Create Driver" for more information.'], ['modelDate' => $data])->withErrors($validator);
        }

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

        return redirect()->back()->with(['successdriver' => 'The driver was added!']);
    }

    public function updateDriver(Request $request)
    {
        $validator = Validator::make($request->all(),  [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:225'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'dateOfBirth' => ['required', 'date'],
            'contactNumber' => ['required', 'string'],
            'dateEmployed' => ['required', 'date'],
            'hometown' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['updatefail' => 'The update failed! Click "Update" for more information.'])->withInput()->withErrors($validator);
        }

        //calls the Dirver model to create a new driver field in the table.
        $driver = Driver::where('driverID', $request['driverID'])->update([
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'email' => $request['email'],
            'dateOfBirth' => $request['dateOfBirth'],
            'contactNumber' => $request['contactNumber'],
            'dateEmployed' => $request['dateEmployed'],
            'hometown' => $request['hometown'],

        ]);
        //calls the driverlicense model to create an new field that can be added to the diverlicenses table.
        $driverlicense = Driverlicense::where('driverID', $request['driverID'])->update(['licenseCode' => $request['licenseCode']]);

        return redirect()->back()->with(['updatesuccess' => 'The update was successful!']);
    }

    public function updateAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['updatefail' => 'The update failed! Click "Update" for more information.'])->withInput()->withErrors($validator);
        }

        $admin = Admin::where('id', $request['adminID'])->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);

        return redirect()->back()->with(['updatesuccess' => 'The update was successful!']);
    }

    public function updateClient(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'cell' => ['required', 'string', 'regex:/^(0)[0-9]{9}/i'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['updatefail' => 'The update failed! Click "Update" for more information.'])->withInput()->withErrors($validator);
        }

        // $admin = User::where('id', $request['clientID'])->update([
        //     'name' => $request['name'],
        //     'surname' => $request['surname'],
        //     'cell' => $request['cell'],
        //     'email' => $request['email'],

        // ]);
        return redirect()->back()->with(['updatefail' => 'Correct validation but disabled for the demo!']);
    }

    public function getAllClients()
    {
        return User::all();
    }

    public function deleteClient(Request $request)
    {
        //$deletedRows = User::where('id', $request['clientID'])->delete();
        return redirect()->back()->with(['updatefail' => 'Correct validation but disabled for the demo!']);
    }

    public function deleteDriver(Request $request)
    {
        $deletedRows = Driverlicense::where('driverID', $request['driverID'])->delete();
        $deletedRows = Driver::where('driverID', $request['driverID'])->delete();
        return redirect()->back()->with(['deletesuccess' => 'The deletion was successful!']);
    }

    public function deleteAdmin(Request $request)
    {
        if ($request['email'] == 'admin@bb.com') {
            return redirect()->back()->with(['updatefail' => 'Please don\'t delete the admin demo user...']);
        }

        $deletedRows = Admin::where('id', $request['adminID'])->where('name', $request['name'])->where('email', $request['email'])->delete();

        if ($deletedRows) {
            return redirect()->back()->with(['deletesuccess' => 'The deletion was successful!']);
        } else {
            return redirect()->back()->with(['updatefail' => 'The deletion failed!']);
        }
    }

    public function deleteBooking(Request $request)
    {
        Booking::where('bookingID', $request['bookingID'])->update(['complete' => 'Yes']);
        return redirect()->back()->with(['bookingsuccess' => 'The booking is complete!']);
    }

    public function listOfDrivers(Request $request)
    {

        $date = $request['bookingDate'];

        $drivers = DB::table('bookings')->select('driverID')->from('bookings')->where('startDate', '=', $date)->whereNotNull('driverID')->get();
        $query = Driver::select('driverID', 'firstName', 'contactNumber')
        ->whereNotIn('driverID', json_decode($drivers, true))->get();


        return response()->json($query);
    }

    public function assignDriver(Request $request)
    {
        $booking = Booking::where('bookingID', $request['bookingID'])->update(['driverID' => $request['driverID']]);

        return response()->json($booking);
    }

    public function getDrivers(Request $request)
    {
        $driver = Driver::select('driverID', 'firstName', 'contactNumber')->where('driverID', $request['driverID'])->get();

        return response()->json($driver);
    }

    public function unassignDriver(Request $request)
    {
        $booking = Booking::where('bookingID', $request['bookingID'])->update(['driverID' => null]);

        return response()->json($booking);
    }

    public function getClients(Request $request)
    {
        $client = User::select('name', 'surname', 'cell', 'email')->where('id', $request['clientID'])->get();

        return response()->json($client);
    }
}
