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
        $daytrips = $request->session()->get('daytrip');

        return view('client.booking.step-one', compact('booking', 'daytrips'));
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

        $request->session()->put('daytrips', $daytrips);

        return redirect()->route('booking.step.two.create', compact('booking', 'daytrips'));
    }

    public function createStepTwo(Request $request)
    {
        $booking = $request->session()->get('booking');
        $daytrips = $request->session()->get('daytrips');

        return view('client.booking.step-two', compact('booking', 'daytrips'));
    }

    public function postStepTwo(Request $request)
    {
        $booking = $request->session()->get('booking');
        $daytrips = $request->session()->get('daytrips');


        $numberOfPassengers = $request['infants'] + $request['children'] + $request['adults'] + $request['elderly'];
        if ($numberOfPassengers > 15) {
            return redirect()->route('booking.step.two.create', compact('booking', 'daytrips'))->withInput()->withErrors(['maximum' => 'Please reduce the number of passengers to below 15.']);
        }

        $booking->fill(['infants' => $request['infants'],
                        'children' => $request['children'],
                        'adults' => $request['adults'], 
                        'elderly' => $request['elderly'],
                        'elderly' => $request['elderly'],
                        'disabled' => $request['disabled'],
                        'babychair' => $request['babychair'],]);

        $request->session()->put('booking', $booking);
        $request->session()->put('daytrip', $daytrips);

        return redirect()->route('booking.step.three.create', compact('booking', 'daytrips'));
    }

    public function createStepThree(Request $request) 
    {
        $booking = $request->session()->get('booking');
        $daytrips = $request->session()->get('daytrips');

        return view('client.booking.step-three' ,compact('booking', 'daytrips'));
    }

    public function postStepThree(Request $request)
    {
        $booking = $request->session()->get('booking');
        $daytrips = $request->session()->get('daytrips');

        
    }
}
