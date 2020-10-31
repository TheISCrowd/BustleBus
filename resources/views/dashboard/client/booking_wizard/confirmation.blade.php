<!-- Booking Confirmation Screen -->

@extends('layouts.app')

@section('content')
<div class="container tk-gill-sans-nova">
    <div class="row">
        <div class="col-md-5 rcorners2 shadow" style="background-color: #F8F8F8;">
            <h3 class="tk-gill-sans-nova"><strong>Booking Summary</strong></h3>
            <br>

            <form method="POST" action="{{ route('booking.step.five.post') }}">
                @csrf

                <!-- basic summary -->

                <h3 class="tk-gill-sans-nova"><strong>Locations</strong></h3>
                <span class="tk-gill-sans-nova"><strong>Start Date:</strong> {{ $booking['startDate'] }}</span><br>
                <span class="tk-gill-sans-nova"><strong>Leaving from:</strong> {{ $booking['initalCollectionPoint'] }}</span><br>
                <span class="tk-gill-sans-nova"><strong>Destination is:</strong> {{ $daytrip['destinationsName'] }}</span><br>

                <br>

                <!-- Passenger Summary -->

                <h3 class="tk-gill-sans-nova"><strong>Passengers</strong></h3>
                <span class="tk-gill-sans-nova"><strong>Passengers:</strong> {{ $booking['infants'] + $booking['children'] + $booking['adults'] + $booking['elderly'] }}</span><br>
                <span class="tk-gill-sans-nova"><strong>Infant:</strong> {{ $booking['infants'] }} persons</span><br>
                <span class="tk-gill-sans-nova"><strong>Children:</strong> {{ $booking['children'] }} persons</span><br>
                <span class="tk-gill-sans-nova"><strong>Adults:</strong> {{ $booking['adults'] }} persons</span><br>
                <span class="tk-gill-sans-nova"><strong>Elderly:</strong> {{ $booking['elderly'] }} persons</span><br>
                <!-- baby chair inclusion -->
                @if($booking['babychair'] > 0)
                <span class="tk-gill-sans-nova"><strong>Number of baby chairs:</strong> {{ $booking['infants'] }}</span><br>
                @endif
                <!-- disability inclusion -->
                @if($booking['disabled'] == true)
                <span class="tk-gill-sans-nova"><strong>Disability assistance:</strong> Yes </span>
                @endif

                <br>
                <br>


                <!-- Luggage summary -->

                <h3 class="tk-gill-sans-nova"><strong>Luggage</strong></h3>
                @if($booking['roofracks'] == true)
                <span class="tk-gill-sans-nova"><strong>Roofracks:</strong>Yes</span><br>
                @endif
                @if($booking['trailer'] == true)
                <span class="tk-gill-sans-nova"><strong>Trailer:</strong>Yes</span><br>
                @endif
                @if($booking['extra'] == true)
                <span class="tk-gill-sans-nova"><strong>Extra Luggage:</strong>Yes</span>
                @endif
                
                <br>
                <br>
                <!-- Vehcile Summary -->

                <h3 class="tk-gill-sans-nova"><strong>Vehicle</strong></h3>
                <span class="tk-gill-sans-nova"><strong>Vehcile Type:</strong> {{ $booking['vehicleType'] }}</span><br>
                <span class="tk-gill-sans-nova"><strong>Vehcicle Capacity:</strong> @if($booking['vehicleType'] == 'sedan') 4 @elseif($booking['vehicleType'] == 'suv') 6 @else 15 @endif Persons</span>

                <br>
                <br>
                <input type="submit" style="margin-bottom: 0.7em; margin-top: 0.7em;" name="send" value="Confirm Booking" class="btn btn-dark btn-block tk-gill-sans-nova">
            </form>
            <a href="{{ URL::route('booking.step.one.create') }}" class="btn" style="background: #F8E78F;"> Locations </a>
            <a href="{{ URL::route('booking.step.two.create') }}" class="btn" style="background: #F8E78F;"> Passengers </a>
            <a href="{{ URL::route('booking.step.three.create') }}" class="btn" style="background: #F8E78F;"> Luggage </a>
            <a href="{{ URL::route('booking.step.four.create') }}" class="btn" style="background: #F8E78F;"> Vehicles </a>
        </div>
    </div>

</div>
@endsection