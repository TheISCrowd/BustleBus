<?php
//This is a controller to control the flow of data from the new-driver.blade.php to the dirverlicenses and dirvers tables in the database.
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Driverlicense;
use App\Models\Booking;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    public function getMyBookings(){
        $bookings = Booking::all();
        return view('dashboard.driver',compact('bookings'));
    }      
}