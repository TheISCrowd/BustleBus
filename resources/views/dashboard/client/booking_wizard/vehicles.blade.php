<!-- Vehicles Screen -->

@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Step buttons to navigate wizzard -->
    <div class="row justify-content-center">
        <div class="col">
            <a href="{{ URL::route('booking.step.one.create') }}" class="btn" style="background: #F8E78F;"> Locations </a>
            <a href="{{ URL::route('booking.step.two.create') }}" class="btn" style="background: #F8E78F;"> Passengers </a>
            <a href="{{ URL::route('booking.step.three.create') }}" class="btn" style="background: #F8E78F;"> Luggage </a>
            <a href="{{ URL::route('booking.step.four.create') }}" class="btn" style="background: #F8E78F;"> Vehcile </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5" style="background-color: #F8F8F8;">
            <h3 class="tk-gill-sans-nova">Select Your Vehicle</h3>
            <form method="POST" action="{{ route('booking.step.four.post') }}">
                @csrf
                <div class="row justify-content-center">



                    <!-- a sedan can take 4 passengers, no trailer/disabled person/extraluggage -->
                    @if($numPassengers > 4 || $trailer == true || $disabled == true || $extra == true)
                    @else
                    <label class="tk-gill-sans-nova">Sedan</label>
                    <input type="radio" class="form-control form-control-sm" name="vehicleType" value="Sedan">
                    @endif


                    <!-- a suv can take 6 passengers and a trailer/disabled person/extra luggage -->
                    @if($numPassengers > 6)

                    @else
                    <label class="tk-gill-sans-nova">Suv</label>
                    <input type="radio" class="form-control form-control-sm" name="vehicleType" value="Suv">
                    @endif

                    <!-- a van meets all of the required specifications so no if statements -->
                    <label class="tk-gill-sans-nova">Van</label>
                    <input type="radio" class="form-control form-control-sm" name="vehicleType" value="Van">


                    <!-- button for form post -->

                    <input type="submit" name="send" value="Next" style="padding-top: 0.5em" class="btn btn-dark btn-block tk-gill-sans-nova">
                </div>

            </form>
        </div>
    </div>

</div>
@endsection