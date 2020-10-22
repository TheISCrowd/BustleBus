<?php

namespace App\Http\Controllers;
use App\Models\Driver;
use App\Models\Driverlicense;
use App\Models\Booking;
use App\Models\Admin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function getAllBookings(){
        return booking::all();
    }  
    
    public function getAllDrivers(){
        return Driver::all(); 
    } 

    public function getAllAdmin(){
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
}
