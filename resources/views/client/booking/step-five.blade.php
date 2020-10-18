<!-- Booking Confirmation Screen -->

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
                <!-- basic summary -->
                <div class="card">
                    <span>Start Date: {{ $booking['startDate'] }}</span>
                    <span>Overnight stays: {{ count($daytrips) }} nights</span>
                    <span>Total passengers: {{ $booking['infants'] + $booking['children'] + $booking['adults'] + $booking['elderly'] }}</span>
                    <span>Initial Collection location: {{ $booking['initalCollectionPoint'] }}</span>
                    <span>Final Destination: {{ end($daytrips)['destinationsName'] }}</span>
                </div>

                <!-- location summary -->
                <div class="card">
                    <span>Trip Starting Date: {{ $booking['startDate'] }}</span>
                    <span>Initial Collection Location {{ $booking['initalCollectionPoint'] }}</span>

                    <span>Overnight stays information:</span>
                    {{ $i = 1 }}
                    @foreach ($daytrips as $daytrip)
                    <span>Overnight stay {{ $i++ }}</span>
                    <span>Date: {{ $daytrip['date'] }}</span>
                    <span>Destination: {{ $daytrip['destinationsName'] }}</span>
                    @endforeach
                </div>

                <!-- Passenger Summary -->
                <div class="card">

                </div>
                <input type="submit" name="send" value="Next" class="btn btn-dark btn-block">
            </div>
        </div>
    </form>
</div>
@endsection