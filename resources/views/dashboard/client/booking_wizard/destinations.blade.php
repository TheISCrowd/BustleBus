<!-- Trip Planning Screen -->
@extends('layouts.app')
<script type="text/javascript" src="{{ asset('js/autocomplete.js') }}"></script>
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSjIfZl3W9pahKIKoppSpS-hbD6XlvjFc&libraries=places&callback=initMap"></script>
@section('content')
<div class="container tk-gill-sans-nova">
    <div class="row">
        <div class="col-md-5 rcorners2 shadow" style="background-color: #F8F8F8;">
            <h3 class="tk-gill-sans-nova"><strong>Plan Your Trip</strong></h3>
            <br>
            <form method="POST" action="{{ route('booking.step.one.post') }}">

                @csrf

                <span class="tk-gill-sans-nova">Start Date:</span>
                <input type="date" class="form-control form-control-sm @error('startDate') is-invalid @enderror" name="startDate" id="startDate" required>

                <!-- start date error reporting -->
                @error('startDate')
                <span class="invalid-feedback" role=alert>
                    <strong>{{ $errors->first('startDate') }}</strong>
                </span>
                @enderror


                <!-- Start destination label and input -->

                <span class="tk-gill-sans-nova">Leaving from:</span>
                <input type="text" class="form-control form-control-sm @error('initalCollectionPoint') is-invalid @enderror" name="initalCollectionPoint" id="initalCollectionPoint" required autocomplete="off" placeholder="Type and select the adress from the list">
                @error('initalCollectionPoint')
                <span class="invalid-feedback" role=alert>
                    <strong>{{ $errors->first('initalCollectionPoint') }}</strong>
                </span>
                @enderror



                <span class="tk-gill-sans-nova">Destination is:</span>
                <input type="text" class="form-control form-control-sm" id="destinationsName" name="destinationsName" autocomplete="off" required placeholder="Type and select the adress from the list">
                @error('destinationsName')
                <span class="invalid-feedback" role=alert>
                    <strong>{{ $errors->first('destinationsName') }}</strong>
                </span>
                @enderror

                <br>
                
                <!-- button to post form -->
                <input type="submit" style="margin-bottom: 0.7em; margin-top: 0.7em;" name="send" value="Next" class="btn btn-dark btn-block tk-gill-sans-nova">
            </form>

            <a href="{{ URL::route('booking.step.one.create') }}" class="btn" style="background: #F8E78F;"> Locations </a>
        </div>
    </div>
</div>
@endsection