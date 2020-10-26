<!-- Trip Planning Screen -->
@extends('layouts.app')
<script type="text/javascript" src="{{ asset('js/autocomplete.js') }}"></script>
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSjIfZl3W9pahKIKoppSpS-hbD6XlvjFc&libraries=places&callback=initMap"></script>
@section('content')
<div class="container">
    <!-- Step buttons to navigate wizzard -->
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <a href="{{ URL::route('booking.step.one.create') }}" class="btn btn-default"> Locations step one </a>
            <a href="#" class="btn btn-default"> Passengers step two </a>
            <a href="#" class="btn btn-default"> Luggage step three </a>
            <a href="#" class="btn btn-default"> Vehciles step four </a>
        </div>
    </div>

    <div class="row ">
        <div class="col-md-5 ">
            <div class="card">

                <div class="col justify-content-center">
                    <h3 class="tk-gill-sans-nova">Plan Your Trip</h3>
                </div>


                <form method="POST" action="{{ route('booking.step.one.post') }}">

                    @csrf
                    <!-- Start date label and input form -->

                    <div class="">
                        <span class="tk-gill-sans-nova">Start Date:</span>
                        <input type="date" class="form-control form-control-sm @error('startDate') is-invalid @enderror" name="startDate" id="startDate" required>

                        <!-- start date error reporting -->
                        @error('startDate')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('startDate') }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Start destination label and input -->
                    <div class="form-group">
                        <span class="tk-gill-sans-nova">Leaving from:</span>
                        <input type="text" class="form-control form-control-sm @error('initalCollectionPoint') is-invalid @enderror" name="initalCollectionPoint" id="initalCollectionPoint" required autocomplete="off" placeholder="Type and select the adress from the list">
                        <br>
                        <!-- start destination error reporting -->
                        @error('initalCollectionPoint')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('initalCollectionPoint') }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <span class="tk-gill-sans-nova">Destination is:</span>
                        <input type="text" class="form-control form-control-sm" id="destinationsName" name="destinationsName" autocomplete="off" required placeholder="Type and select the adress from the list">
                        @error('destinationsName')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('destinationsName') }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- button to post form -->
                    <input type="submit" name="send" value="Next" class="btn btn-dark btn-block">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection