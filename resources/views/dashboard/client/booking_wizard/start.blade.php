<!-- Start Booking Page -->

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <h2 class="tk-carlmarx im-centered">We'll Take You On A Trip</h2>
        </div>


    </div>
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="tk-carlmarx" id="title"><strong>MAKE A BOOKING</strong></div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <a href="{{ URL::route('booking.step.one.create') }}" class="btn btn-lg btn-default">
                <h3 class="tk-gill-sans-nova">START</h3>
            </a>
        </div>
    </div>
</div>


@endsection