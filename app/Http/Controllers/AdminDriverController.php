<?php
//This is a controller to control the flow of data from the new-driver.blade.php to the dirverlicenses and dirvers tables in the database.
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Driverlicense;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;

class AdminDriverController extends Controller
{
    // this is the get function to display the view
    public function showNewDriverForm() {
        return view('dashboard.admin.driver.new-driver');
    }
    

    // this is the post function to add a new driver into the data base
    
    public function createNewDriver(Request $request) 
    {  
    //Validator for all data from the input form. *field name* => [Specifictations]
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
            
        return redirect()->intended('dashboard.dashboard');  
            
    }
}
