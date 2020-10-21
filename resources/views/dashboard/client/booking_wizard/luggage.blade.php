<!-- Luggage Screen -->

@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Step buttons to navigate wizzard -->
    <div class="row justify-content-center">
        <a href="{{ URL::route('booking.step.one.create') }}" class="btn btn-default"> Locations step one </a>
        <a href="{{ URL::route('booking.step.two.create') }}" class="btn btn-default"> Passengers step two </a>
        <a href="{{ URL::route('booking.step.three.create') }}" class="btn btn-default"> Luggage step three </a>
        <a href="#" class="btn btn-default"> Vehciles step four </a>
    </div>

    <form method="POST" action="{{ route('booking.step.three.post') }}">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <!-- luggage labels and input fields -->
                    <label>Roofracks</label>
                    <input type="checkbox" class="form-control" name="roofracks" id="roofracks">
                    <label>Trailer</label>
                    <input type="checkbox" class="form-control" name="trailer" id="trailer">   
                    <label>Extra luggage</label>
                    <input type="checkbox" class="form-control" name="extra" id="extra">
                </div>
                <input type="submit" name="send" value="Next" class="btn btn-dark btn-block">
            </div>
        </div>
    </form>
</div>
@endsection