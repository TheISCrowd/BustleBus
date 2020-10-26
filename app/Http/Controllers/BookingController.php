<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Daytrip;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    // Show the start-booking view
    public function startBooking(Request $request)
    {
        return view('dashboard.client.booking_wizard.start');
        
    }

    public function createStepOne(Request $request)
    {
        $booking = new Booking();
        $daytrip = new Daytrip();

        $request->session()->put('booking', $booking);
        $request->session()->put('daytrip', $daytrip);

        return view('dashboard.client.booking_wizard.destinations');
    }

    public function postStepOne(Request $request)
    {
        // booking startdate and location validation
        $validatedBooking = Validator::make($request->all(), [
            'startDate' => 'required|date|after:today',
            'initalCollectionPoint' => 'required|string',
        ]);   

        if ($validatedBooking->fails()) {
            return redirect()->back()->withInput()->withErrors($validatedBooking);
        }

        $validatedDaytrip  = Validator::make($request->all(), [
            'destinationsName' => 'required|string'
        ]); 

        if ($validatedDaytrip->fails()) {
            return redirect()->back()->withInput()->withErrors($validatedDaytrip);
        }

        $booking = $request->session()->get('booking');
        $booking->fill([
            'startDate' => $request['startDate'],
            'initalCollectionPoint' => $request['initalCollectionPoint']
            ]);

        $daytrip = $request->session()->get('daytrip');
        $daytrip->fill([
            'destinationsName' => $request['destinationsName']
            ]);

        $request->session()->put('booking', $booking);
        $request->session()->put('daytrip', $daytrip);

        return redirect()->route('booking.step.two.create');
    }

    public function createStepTwo(Request $request)
    {
        return view('dashboard.client.booking_wizard.passengers');
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
        } else if (($request['adults'] == 0 && $request['elderly'] == 0)) {
            return redirect()->route('booking.step.two.create')->withInput()->withErrors(['parental' => 'If infant and children are passengers selected there must be an adult or elderly passenger for parental supervision.']);
        }


        // populate session booking data with input fields
        $booking = $request->session()->get('booking');
        $booking->fill(['infants' => $request['infants'],
                        'children' => $request['children'],
                        'adults' => $request['adults'], 
                        'elderly' => $request['elderly'],
                        'disabled' => $request['disabled'],
                        'babychair' => ($request['infants'] )]);
        $request->session()->put('booking', $booking);

        return redirect()->route('booking.step.three.create');
    }

    public function createStepThree(Request $request) 
    {
        return view('dashboard.client.booking_wizard.luggage');
    }

    public function postStepThree(Request $request)
    {
        // fill booking sesion variable with input data
        $booking = $request->session()->get('booking');
        $booking->fill(['trailer' => $request['trailer'],
                       'roofracks' => $request['roofracks'],
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

        return view('dashboard.client.booking_wizard.vehicles', ['numPassengers' => $numberOfPassengers, 'extra' => $extraLuggage, 'trailer' => $trailer, 'disabled' => $disabled]);
    }

    public function postStepFour(Request $request) {
        // fill booking session variable with the vehicle type
        $booking = $request->session()->get('booking');
        $booking->fill(['vehicleType' => $request['vehicleType']]);
        $request->session()->put('booking', $booking);

        return redirect()->route('booking.step.five.create');
    }

    public function createStepFive(Request $request)
    {
        $booking = $request->session()->get('booking');
        $daytrip = $request->session()->get('daytrip');

        return view('dashboard.client.booking_wizard.confirmation', ['booking' => $booking, 'daytrip' => $daytrip]);
    }

    public function postStepFive(Request $request)
    {
        $request->session()->get('booking')->save();
        $request->session()->get('daytrip')->save();   

        return view('dashboard.dashboard');
    }
}