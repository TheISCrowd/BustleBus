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
    public function startBooking(Request $request)
    {
        // when starting a new booking weflush the session data for old data.
        if (!empty($request->session()->get('booking'))) {
            $request->session()->forget('booking');    
        }
        if (!empty($request->session()->get('daytrips'))) {
            $request->session()->forget('daytrips');    
        }

        return view('client.booking.start-booking');
    }

    public function createStepOne(Request $request)
    {
        return view('client.booking.step-one');
    }

    public function postStepOne(Request $request)
    {
        // booking startdate and location validation
        $validatedBooking = $request->validate([
            'startDate' => 'required|date|after:today',
            'initalCollectionPoint' => 'required|string',
            //'endDate' => 'require|date|after:startDate + i day'
        ]);

        // does a booking session variable already exist?
        if (empty($request->session()->get('booking'))) {
            $booking = new Booking();   // no
        } else {
            $booking = $request()->session()->get('booking'); // yes
        }

        // fill booking with validated data and save to session data
        $booking->fill($validatedBooking);
        $request->session()->put('booking', $booking);

        // create daytrip session variables for each overnight stay
        $daytrips = [];
        foreach ($request->input('destinationsName') as $key => $value) {
            $daytrip = new Daytrip();
            $daytrip->fill(['destinationsName' => $value]);
            array_push($daytrips, $daytrip);
        }
        $request->session()->put('daytrips', $daytrips);

        return redirect()->route('booking.step.two.create');
    }

    public function createStepTwo(Request $request)
    {
        return view('client.booking.step-two');
    }

    public function postStepTwo(Request $request)
    {
        // error check - max passengers < 15
        $numberOfPassengers = $request['infants'] + $request['children'] + $request['adults'] + $request['elderly'];
        if ($numberOfPassengers > 15) {
            return redirect()->route('booking.step.two.create')->withInput()->withErrors(['maximum' => 'Please reduce the number of passengers to below 15.']);
        }

        // error check - infant selected for baby chair
        if ($request['babychair'] == true && $request['infants'] == 0) {
            return redirect()->route('booking.step.two.create')->withInput()->withErrors(['babychair' => 'Please select infant passengers if you require a babychair.']);
        }

        // error check - parental supervision and zero passengers
        if ($numberOfPassengers == 0) {
            return redirect()->route('booking.step.two.create')->withInput()->withErrors(['zero' => 'Zero passengers have been selected for the trip.']);
        } else if (($request['adult'] == 0 && $request['elderly'] == 0) && ($request['infant'] == 0 || $request['children'] == 0)) {
            return redirect()->route('booking.step.two.create')->withInput()->withErrors(['parental' => 'If infant and children are passengers selected there must be an adult or elderly passenger for parental supervision.']);
        }

        // populate session booking data with input fields
        $booking = $request->session()->get('booking');
        $booking->fill(['infants' => $request['infants'],
                        'children' => $request['children'],
                        'adults' => $request['adults'], 
                        'elderly' => $request['elderly'],
                        'disabled' => $request['disabled'],
                        'babychair' => $request['babychair'],]);
        $request->session()->put('booking', $booking);

        return redirect()->route('booking.step.three.create');
    }

    public function createStepThree(Request $request) 
    {
        return view('client.booking.step-three');
    }

    public function postStepThree(Request $request)
    {
        // fill booking sesion variable with input data
        $booking = $request->session()->get('booking');
        $booking->fill(['trailer' => $request['trailer'],
                       'roofrack' => $request['roofrack'],
                       'extra' => $request['extra']]);
        $request->session()->put('booking', $booking);

        return redirect()->route('booking.step.four.create');
    }

    public function createStepFour(Request $request) 
    {
        // pass data with route to determine the vehicles that can be used for the trip
        $booking = $request->session()->get('booking');
        $numberOfPassengers = $booking['infants'] + $booking['children'] + $booking['adults'] + $booking['elderly'];
        $extraLuggage = $booking['extra'];
        $trailer = $booking['trailer'];
        $disabled = $booking['disabled'];

        return view('client.booking.step-four', ['numPassengers' => $numberOfPassengers, 'extra' => $extraLuggage, 'trailer' => $trailer, 'disabled' => $disabled]);
    }

    public function postStepFour(Request $request) {
        // fill booking session variable with the vehicle type
        $booking = $request->session()->get('booking');
        $booking->fill(['vehicleType' => $request['vehicle']]);
        $request->session()->put('booking', $booking);

        return redirect()->route('booking.step.five.create');
    }

    public function createStepFive(Request $request)
    {
        $booking = $request->session()->get('booking');
        $daytrips = $request->session()->get('daytrips');

        return view('client.booking.step-five', ['booking' => $booking, 'daytrips' => $daytrips]);
    }

    public function postStepFive() 
    {
        return redirect()->route('booking.summary.create');
    }
}