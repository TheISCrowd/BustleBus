<!-- Luggage Screen -->

@extends('layouts.app')

@section('content')
<div class="container tk-gill-sans-nova">
    <div class="row">
        <div class="col-md-5 rcorners2 shadow" style="background-color: #F8F8F8;">
            <h3 class="tk-gill-sans-nova"><strong>Select Vehicle Extras</strong></h3>
            <br>
            <form method="POST" action="{{ route('booking.step.three.post') }}">
                @csrf

                    <span class="tk-gill-sans-nova">Roofracks:</span>
                    <input type="checkbox" style="vertical-align: -0.3em" class="" name="roofracks" id="roofracks"> <br>
                    <span class="tk-gill-sans-nova">Trailer:</span>
                    <input type="checkbox" style="vertical-align: -0.3em" class="" name="trailer" id="trailer"> <br>
                    <span class="tk-gill-sans-nova">Extra Luggage:</span>
                    <input type="checkbox" style="vertical-align: -0.3em" class="" name="extra" id="extra">

                <br>
                <br>
                <input type="submit" style="margin-bottom: 0.7em; margin-top: 0.7em;" name="send" value="Next" class="btn btn-dark btn-block tk-gill-sans-nova">
            </form>
            <a href="{{ URL::route('booking.step.one.create') }}" class="btn" style="background: #F8E78F;"> Locations </a>
            <a href="{{ URL::route('booking.step.two.create') }}" class="btn" style="background: #F8E78F;"> Passengers </a>
            <a href="{{ URL::route('booking.step.three.create') }}" class="btn" style="background: #F8E78F;"> Luggage </a>
        </div>
    </div>


</div>
@endsection