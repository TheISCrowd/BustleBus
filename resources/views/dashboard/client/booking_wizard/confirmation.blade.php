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
                <!-- passed the the $booking object variable and $daytrips object array from the session data -->
                <!-- basic summary -->
                <div class="card">
                    <h5>Basic summary</h5>
                    <span>Start Date: {{ $booking['startDate'] }}</span>
                    <span>Overnight stays: {{ count($daytrips) }} nights</span>
                    <span>Total passengers: {{ $booking['infants'] + $booking['children'] + $booking['adults'] + $booking['elderly'] }}</span>
                    <span>Initial Collection location: {{ $booking['initalCollectionPoint'] }}</span>
                    <span>Final Destination: {{ end($daytrips)['destinationsName'] }}</span>
                </div>

                <!-- location summary -->
                <div class="card">
                    <h5>Full location summary</h5>
                    <span>Trip Starting Date: {{ $booking['startDate'] }}</span>
                    <span>Initial Collection Location {{ $booking['initalCollectionPoint'] }}</span>

                    <span>Overnight stays information:</span>
                    @php $i = 1 @endphp
                    @foreach ($daytrips as $daytrip)
                    <span>Overnight stay {{ $i++ }}</span>
                    <span>Date: {{ $daytrip['date'] }}</span>
                    <span>Destination: {{ $daytrip['destinationsName'] }}</span>
                    @endforeach
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