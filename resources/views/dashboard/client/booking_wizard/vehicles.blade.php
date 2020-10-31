<!-- Vehicles Screen -->

@extends('layouts.app')

@section('content')
<div class="container tk-gill-sans-nova">
    <div class="row">
        <div class="col-md-5 rcorners2 shadow" style="background-color: #F8F8F8;">
            <h3 class="tk-gill-sans-nova"><strong>Select Your Vehicle</strong></h3>
            <br>
            <form method="POST" action="{{ route('booking.step.four.post') }}">
                @csrf

                <!-- a sedan can take 4 passengers, no trailer/disabled person/extraluggage -->
                @if($numPassengers > 4 || $trailer == true || $disabled == true || $extra == true)
                @else
                <span class="tk-gill-sans-nova">Sedan:</span>
                <input type="radio" style="vertical-align: -0.3em" name="vehicleType" value="Sedan" @if ($modelData['vehicleType'] == 'Sedan') checked @endif> <br>
                @endif


                <!-- a suv can take 6 passengers and a trailer/disabled person/extra luggage -->
                @if($numPassengers > 6)

                @else
                <span class="tk-gill-sans-nova">Suv:</span>
                <input type="radio" style="vertical-align: -0.3em" name="vehicleType" value="Suv" @if ($modelData['vehicleType'] == 'Suv') checked @endif> <br>
                @endif

                <!-- a van meets all of the required specifications so no if statements -->
                <span class="tk-gill-sans-nova">Van:</span>
                <input type="radio" style="vertical-align: -0.3em" name="vehicleType" value="Van" @if ($modelData['vehicleType'] == 'Van') checked @endif> 
                
               
                <br>
                <br>
                <input type="submit" style="margin-bottom: 0.7em; margin-top: 0.7em;" name="send" value="Next" class="btn btn-dark btn-block tk-gill-sans-nova">
            </form>
            <a href="{{ URL::route('booking.step.one.create') }}" class="btn" style="background: #F8E78F;"> Locations </a>
            <a href="{{ URL::route('booking.step.two.create') }}" class="btn" style="background: #F8E78F;"> Passengers </a>
            <a href="{{ URL::route('booking.step.three.create') }}" class="btn" style="background: #F8E78F;"> Luggage </a>
            <a href="{{ URL::route('booking.step.four.create') }}" class="btn" style="background: #F8E78F;"> Vehicle </a>
        </div>
    </div>

</div>
@endsection