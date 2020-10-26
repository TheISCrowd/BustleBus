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

    <form method="POST" action="{{ route('booking.step.five.post') }}">
        @csrf
        <div class="row ">
            <div class="col-md-6 ">
                <!-- passed the the $booking object variable and $daytrips object array from the session data -->
                <!-- basic summary -->
                <div class="card">
                    <span>Start Date: {{ $booking['startDate'] }}</span>
                    <span>Initial Collection location: {{ $booking['initalCollectionPoint'] }}</span>
                    <span>Final Destination: {{ $daytrip['destinationsName'] }}</span>
                    <span>Total passengers: {{ $booking['infants'] + $booking['children'] + $booking['adults'] + $booking['elderly'] }}</span>
                </div>


                <!-- Passenger Summary -->
                <div class="card">
                    <h5>Full passenger summary</h5>
                    <span>Infant: {{ $booking['infants'] }} persons</span>
                    <span>children: {{ $booking['children'] }} persons</span>
                    <span>Adults: {{ $booking['adults'] }} persons</span>
                    <span>Elderly: {{ $booking['elderly'] }}</span>

                    <!-- baby chair inclusion -->
                    @if($booking['babychair'] == true)
                    <span>Number of baby chairs: {{ $booking['infants'] }}</span>
                    @endif

                    <!-- disability inclusion -->
                    @if($booking['disabled'] == true)
                    <span>Disability assistance (wheelchairs and ramp): Included </span>
                    @endif
                </div>

                <!-- Luggage summary -->
                <div class="card">
                    <h5>Full luggage summary</h5>
                    <span>Roofracks requested: @if($booking['roofracks'] == true) Yes @else No @endif</span>
                    <span>Trailer requested: @if($booking['trailer'] == true) Yes @else No @endif</span>
                    <span>Extra Luggage requested: @if($booking['extra'] == true) Yes @else No @endif</span>
                </div>

                <!-- Vehcile Summary -->
                <div class="card">
                    <h5>Full Vehicle Summary</h5>
                    <span>Vehcile Type: {{ $booking['vehicleType'] }}</span>
                    <span>Vehcicle Capacity: @if($booking['vehicleType'] == 'sedan') 4 @elseif($booking['vehicleType'] == 'suv') 6 @else 15 @endif Persons</span>
                </div>
                <input type="submit" name="send" value="Confirm Booking" class="btn btn-dark btn-block">
            </div>
        </div>
    </form>
</div>
@endsection