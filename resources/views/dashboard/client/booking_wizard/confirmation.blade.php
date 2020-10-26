<!-- Booking Confirmation Screen -->

@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Step buttons to navigate wizzard -->
    <div class="row justify-content-center">
        <div class="col">
            <a href="{{ URL::route('booking.step.one.create') }}" class="btn" style="background: #F8E78F;"> Locations </a>
            <a href="{{ URL::route('booking.step.two.create') }}" class="btn" style="background: #F8E78F;"> Passengers </a>
            <a href="{{ URL::route('booking.step.three.create') }}" class="btn" style="background: #F8E78F;"> Luggage </a>
            <a href="{{ URL::route('booking.step.four.create') }}" class="btn" style="background: #F8E78F;"> Vehciles </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5" style="background-color: #F8F8F8;">
            <h3 class="tk-gill-sans-nova">Select Your Vehicle</h3>

            <form method="POST" action="{{ route('booking.step.five.post') }}">
                @csrf
                <!-- passed the the $booking object variable and $daytrips object array from the session data -->
                <!-- basic summary -->
                <h4 class="tk-gill-sans-nova">Overall Summary</h4>
                <span class="tk-gill-sans-nova">Start Date: {{ $booking['startDate'] }}</span><br>
                <span class="tk-gill-sans-nova">Initial Collection location: {{ $booking['initalCollectionPoint'] }}</span><br>
                <span class="tk-gill-sans-nova">Final Destination: {{ $daytrip['destinationsName'] }}</span><br>
                <span class="tk-gill-sans-nova">Total passengers: {{ $booking['infants'] + $booking['children'] + $booking['adults'] + $booking['elderly'] }}</span>


                <br><br>
                <!-- Passenger Summary -->

                <h4 class="tk-gill-sans-nova">Full passenger summary</h4>
                <span class="tk-gill-sans-nova">Infant: {{ $booking['infants'] }} persons</span><br>
                <span class="tk-gill-sans-nova">children: {{ $booking['children'] }} persons</span><br>
                <span class="tk-gill-sans-nova">Adults: {{ $booking['adults'] }} persons</span><br>
                <span class="tk-gill-sans-nova">Elderly: {{ $booking['elderly'] }}</span><br>

                <!-- baby chair inclusion -->
                @if($booking['babychair'] == true)
                <span class="tk-gill-sans-nova">Number of baby chairs: {{ $booking['infants'] }}</span><br>
                @endif

                <!-- disability inclusion -->
                @if($booking['disabled'] == true)
                <span class="tk-gill-sans-nova">Disability assistance (wheelchairs and ramp): Included </span>
                @endif

                <br><br>

                <!-- Luggage summary -->

                <h4 class="tk-gill-sans-nova">Full luggage summary</h4>
                <span class="tk-gill-sans-nova">Roofracks requested: @if($booking['roofracks'] == true) Yes @else No @endif</span><br>
                <span class="tk-gill-sans-nova">Trailer requested: @if($booking['trailer'] == true) Yes @else No @endif</span><br>
                <span class="tk-gill-sans-nova">Extra Luggage requested: @if($booking['extra'] == true) Yes @else No @endif</span>

                <br><br>
                <!-- Vehcile Summary -->

                <h4 class="tk-gill-sans-nova">Full Vehicle Summary</h4>
                <span class="tk-gill-sans-nova">Vehcile Type: {{ $booking['vehicleType'] }}</span><br>
                <span class="tk-gill-sans-nova">Vehcicle Capacity: @if($booking['vehicleType'] == 'sedan') 4 @elseif($booking['vehicleType'] == 'suv') 6 @else 15 @endif Persons</span>

                <input type="submit" name="send" value="Confirm Booking" class="btn btn-dark btn-block tk-gill-sans-nova">
        </div>
    </div>
    </form>
</div>
@endsection