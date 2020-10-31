<!-- Passenger Screen -->

@extends('layouts.app')

@section('content')

<div class="container tk-gill-sans-nova">

    
    <div class="row justify-content-center">
        <div class="tk-carlmarx" id="title"><strong>Congratulations!</strong></div>
    </div>
    <div class="row justify-content-center">

        <h2 class="tk-carlmarx im-centered">Your Booking Was Successful!</h2>
    </div>
    <br>
    <div class="row justify-content-center">
        <a href="{{ URL::route('booking.step.one.create') }}" class="btn btn-lg" style="background: #F8E78F;">
            <h3 class="tk-gill-sans-nova">Book Again?</h3>
        </a>
    </div>



</div>
@endsection