<!-- Luggage Screen -->

@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Step buttons to navigate wizzard -->
    <div class="row justify-content-center">
        <div class="col">
            <a href="{{ URL::route('booking.step.one.create') }}" class="btn" style="background: #F8E78F;"> Locations </a>
            <a href="{{ URL::route('booking.step.two.create') }}" class="btn" style="background: #F8E78F;"> Passengers </a>
            <a href="{{ URL::route('booking.step.three.create') }}" class="btn" style="background: #F8E78F;"> Luggage </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5" style="background-color: #F8F8F8;">
            <h3 class="tk-gill-sans-nova">Select Vehicle Extras</h3>
            <form method="POST" action="{{ route('booking.step.three.post') }}">
                @csrf
                <div class="row justify-content-center">

                    <!-- luggage labels and input fields -->
                    <span class="tk-gill-sans-nova">Roofracks:</span>
                    <input type="checkbox" class="form-control form-control-sm" name="roofracks" id="roofracks">
                    <span class="tk-gill-sans-nova">Trailer:</span>
                    <input type="checkbox" class="form-control form-control-sm" name="trailer" id="trailer">
                    <span class="tk-gill-sans-nova">Extra Luggage:</span>
                    <input type="checkbox" class="form-control form-control-sm" name="extra" id="extra">

                    <input type="submit" name="send" value="Next" class="btn btn-dark btn-block tk-gill-sans-nova">

                </div>
            </form>

        </div>
    </div>


</div>
@endsection