<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Daytrip;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function createStepOne(Request $request)
    {
        if (empty($request->session()->get('booking'))) {
            $booking = new Booking();
            $daytrip = new Daytrip();
        } else {
            $booking = $request->session()->get('booking');
            $daytrip = $request->session()->get('daytrip');
        }


        $data = [
            'startDate' => $booking['startDate'],
            'initalCollectionPoint' => $booking['initalCollectionPoint'],
            'destinationsName' => $daytrip['destinationsName']
        ];

        $request->session()->put('booking', $booking);
        $request->session()->put('daytrip', $daytrip);

        return view('dashboard.client.booking_wizard.destinations', ['modelData' => $data]);
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
            'initalCollectionPoint' => $request['initalCollectionPoint'],
        ]);

        $daytrip = $request->session()->get('daytrip');
        $daytrip->fill([
            'destinationsName' => $request['destinationsName']
        ]);

        $booking->fill(['dropOff' => $daytrip['destinationsName']]);

        $request->session()->put('booking', $booking);
        $request->session()->put('daytrip', $daytrip);

        return redirect()->route('booking.step.two.create');
    }

    public function createStepTwo(Request $request)
    {
        $booking = $request->session()->get('booking');
        $data = [
            'infants' => $booking['infants'],
            'children' => $booking['children'],
            'adults' => $booking['adults'],
            'elderly' => $booking['elderly'],
            'disabled' => $booking['disabled'],
            'babychair' => $booking['babychair']
        ];

        return view('dashboard.client.booking_wizard.passengers', ['modelData' => $data]);
    }

    public function postStepTwo(Request $request)
    {
        $booking = $request->session()->get('booking');
        $booking->fill([
            'infants' => $request['infants'],
            'children' => $request['children'],
            'adults' => $request['adults'],
            'elderly' => $request['elderly'],
            'disabled' => $request['disabled']
        ]);

        if ($request['babychair'] == 'on') {
            $booking->fill(['babychair' => $request['infants']]);
        } else {
            $booking->fill(['babychair' => 0]);
        }

        // error check - max passengers < 15
        $numberOfPassengers = $request['infants'] + $request['children'] + $request['adults'] + $request['elderly'];
        if ($numberOfPassengers > 15) {
            return redirect()->route('booking.step.two.create')->withErrors(['maximum' => 'Please reduce the number of passengers to below 15.']);
        }

        // error check - infant selected for baby chair
        if ($request['babychair'] == true && $request['infants'] == 0) {
            return redirect()->route('booking.step.two.create')->withErrors(['babychair' => 'Please select infant passengers if you require a babychair.']);
        }

        // error check - parental supervision and zero passengers
        if ($numberOfPassengers == 0) {
            return redirect()->route('booking.step.two.create')->withErrors(['zero' => 'Zero passengers have been selected for the trip.']);
        } else if (($request['adults'] == 0 && $request['elderly'] == 0)) {
            return redirect()->route('booking.step.two.create')->withErrors(['parental' => 'If infant and children are passengers selected there must be an adult or elderly passenger for parental supervision.']);
        }


        // populate session booking data with input fields

        $request->session()->put('booking', $booking);

        return redirect()->route('booking.step.three.create');
    }

    public function createStepThree(Request $request)
    {
        $booking = $request->session()->get('booking');
        $data = [
            'roofracks' => $booking['roofracks'],
            'trailer' => $booking['trailer'],
            'extra' => $booking['extra']
        ];

        return view('dashboard.client.booking_wizard.luggage', ['modelData' => $data]);
    }

    public function postStepThree(Request $request)
    {
        // fill booking sesion variable with input data
        $booking = $request->session()->get('booking');
        $booking->fill([
            'trailer' => $request['trailer'],
            'roofracks' => $request['roofracks'],
            'extra' => $request['extra']
        ]);
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

        $data = [
            'vehicleType' => $booking['vehicleType']
        ];

        return view('dashboard.client.booking_wizard.vehicles', ['numPassengers' => $numberOfPassengers, 'extra' => $extraLuggage, 'trailer' => $trailer, 'disabled' => $disabled, 'modelData' => $data]);
    }

    public function postStepFour(Request $request)
    {
        // fill booking session variable with the vehicle type
        $booking = $request->session()->get('booking');
        $booking->fill(['clientID' => Auth::User()->id]);
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

        $booking = new Booking();
        $daytrip = new Daytrip();

        $request->session()->put('booking', $booking);
        $request->session()->put('daytrip', $daytrip);

        return view('dashboard.client.booking_wizard.success');
    }
}
