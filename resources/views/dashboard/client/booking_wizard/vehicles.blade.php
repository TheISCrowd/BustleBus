<!-- Vehicles Screen -->

@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Step buttons to navigate wizzard -->
    <div class="row justify-content-center">
        <a href="{{ URL::route('booking.step.one.create') }}" class="btn btn-default"> Locations step one </a>
        <a href="{{ URL::route('booking.step.two.create') }}" class="btn btn-default"> Passengers step two </a>
        <a href="{{ URL::route('booking.step.three.create') }}" class="btn btn-default"> Luggage step three </a>
        <a href="{{ URL::route('booking.step.four.create') }}" class="btn btn-default"> Vehciles step four </a>
    </div>

    <form method="POST" action="{{ route('booking.step.four.post') }}">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <h5>The following vehciles meet your required specifications:</h5>
                    <!-- displays the number of passengers requested -->
                    <p>Number of passengers: {{ $numPassengers }}</p>

                    <!-- displays if trailer requested -->
                    @if($trailer == true)
                    <p>A trailer has been requested</p>
                    @endif

                    <!-- displays if extra luggage requested -->
                    @if($extra == true)
                    <p>Space for extra luggage has been requested</p>
                    @endif

                    <!-- displays if a person is disabled -->
                    @if($disabled == true)
                    <p>A vehcile to accomdate a disabled person/s has been requested</p>
                    @endif
                 
                    <label>Sedan</label>
                    <!-- a sedan can take 4 passengers, no trailer/disabled person/extraluggage -->
                    @if($numPassengers > 4 || $trailer == true || $disabled == true || $extra == true)
                    <p>This type of vehicle cannot meet your required specifications</p>
                    @else
                    <input type="radio" class="form-control" name="vehicleType" value="Sedan">
                    @endif

                    <label>Suv</label>
                    <!-- a suv can take 6 passengers and a trailer/disabled person/extra luggage -->
                    @if($numPassengers > 6)
                    <p>This type of vehicle cannot meet your required specifications</p>
                    @else
                    <input type="radio" class="form-control" name="vehicleType" value="Suv">
                    @endif

                    <!-- a van meets all of the required specifications so no if statements -->
                    <label>Van</label>
                    <input type="radio" class="form-control" name="vehicleType" value="Van">

                </div>
                <!-- button for form post -->
                <input type="submit" name="send" value="Next" class="btn btn-dark btn-block">
            </div>
        </div>
    </form>
</div>
@endsection