<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Daytrip;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Show the start-booking view
    public function startBooking() {
        $booking = Booking::all();
        $daytrip = Daytrip::all();

        return view('booking.start', compact('booking', 'daytrip'));
    }

    public function createStepOne(Request $request) {
        $booking = $request->session()->get('booking');
        $daytrip = $request->session()->get('daytrip');

        return view('booking.step.one.create', compact('booking', 'daytrip'));
    }

    public function postStepOne(Request $request, $i) {
        // create validation


        $validatedBooking = $request->validate([
            'date' => "require"
        ]);

        foreach ($variable as $key => $value) {
            # code...
        }
        $validateLocations = $request['']->validate([

        ]);
        
        $daytrip = $request->session()->get('daytrip');

        if (empty($request->session()->get('booking'))) {
            $booking = new Booking();
            $booking->fill($validatedBooking);
            $request->session()->put('booking', $booking);
        } else {
            $booking = $request->session()->get('booking');
            $booking->fill($validatedBooking);
            $request->session()->put('booking', $booking);
        }
        
        if (empty($request->session()->get('daytrip'))) {
            $daytrip = new Daytrip();
            $daytrip->fill($validatedData);
            $request->session()->put('daytrip', $daytrip);
        } else {
            $daytrip = $request->session()->get('daytrip');
            $daytrip->fill($validatedData);
            $request->session()->put('daytrip', $daytrip);
        }
    }
}
