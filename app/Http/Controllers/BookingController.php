<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Daytrip;
use Illuminate\Support\Facades\Auth;
use Validator;

class BookingController extends Controller
{
    // Show the start-booking view
    public function startBooking()
    {
        $booking = Booking::all();
        $daytrip = Daytrip::all();

        return view('client.booking.start-booking', compact('booking', 'daytrip'));
    }

    public function createStepOne(Request $request)
    {
        $booking = $request->session()->get('booking');
        $daytrip = $request->session()->get('daytrip');

        return view('client.booking.step-one', compact('booking', 'daytrip'));
    }

    public function postStepOne(Request $request)
    {
        // create validation
        $validatedBooking = $request->validate([
            'startDate' => 'required|date|after:today',
            'initalCollectionPoint' => 'required|string',
            //'endDate' => 'require|date|after:startDate + i day'
        ]);

        if (empty($request->session()->get('booking'))) {
            $booking = new Booking();
            $booking->fill($validatedBooking);
            $request->session()->put('booking', $booking);
        } else {
            $booking = $request->session()->get('booking');
            $booking->fill($validatedBooking);
            $request->session()->put('booking', $booking);
        }

        

        $daytrips = [];
        foreach ($request->input('destinationsName') as $key => $value) {
            $daytrip = new Daytrip();
            $daytrip->fill(['destinationsName' => $value]);
            array_push($daytrips, $daytrip);
        }
        
        $request->session()->put('daytrip', $daytrips);

        return redirect()->route('booking.step.two.create', compact('booking', 'daytrip'));
    }

    public function createStepTwo(Request $request)
    {
        $booking = $request->session()->get('booking');
        $daytrips = $request->session()->get('daytrips');

        return view('client.booking.step-two', compact('booking', 'daytrips'));
    }
}
