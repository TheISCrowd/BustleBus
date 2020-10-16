<!-- Luggage Screen -->

@extends('layouts.app')

@section('content')

<div class="container">
    <form method="POST" action="{{ route('booking.step.three.post') }}">
        @csrf
        <div class="row justify-content-center">

            <div class="col-md-5">
                <div class="card">
                    <h4>Luggage Guide</h4>
                    <p>Lorem Ipsum</p>
                </div>

                <div class="card">
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