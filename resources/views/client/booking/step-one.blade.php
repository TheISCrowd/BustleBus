<!-- Trip Planning Screen -->
@extends('layouts.app')
<script type="text/javascript" src="{{ asset('js/map.js') }}"></script>
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSjIfZl3W9pahKIKoppSpS-hbD6XlvjFc&libraries=places&callback=initMap"></script>
@section('content')
<div class="container">
    <!-- Step buttons to navigate wizzard -->
    <div class="row justify-content-center">
        <a href="{{ URL::route('booking.step.one.create') }}" class="btn btn-default"> Locations step one </a>
        <a href="{{ URL::route('booking.step.two.create') }}" class="btn btn-default"> Passengers step two </a>
        <a href="{{ URL::route('booking.step.three.create') }}" class="btn btn-default"> Luggage step three </a>
        <a href="{{ URL::route('booking.step.four.create') }}" class="btn btn-default"> Vehciles step four </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <form method="POST" action="{{ route('booking.step.one.post') }}">
                    @csrf
                    <!-- Start date label and input form -->
                    <div class="form-group">
                        <label>Start Date:</label>
                        <input type="date" class="form-control @error('startDate') is-invalid @enderror" name="startDate" id="startDate" required>

                        <!-- start date error reporting -->
                        @error('startDate')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('startDate') }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Start destination label and input -->
                    <div class="form-group">
                        <label>Initial Collection Address:</label>
                        <input type="text" class="form-control @error('initalCollectionPoint') is-invalid @enderror" name="address" id="address" required autocomplete="off" placeholder="Please start typing the address and then select the address from the list">

                        <!-- start destination error reporting -->
                        @error('initalCollectionPoint')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('initalCollectionPoint') }}</strong>
                        </span>
                        @enderror

                        <!-- Google map implementation. This enables autocomplete too. -->
                        <div id="map" style="height: 0%"></div>
                    </div>
                    <!-- hidden field that accepts address as coordinates -->
                    <div class="form-group">
                        <input type="hidden" name="initalCollectionPoint" id="initalCollectionPoint">
                    </div>

                    <!-- destination address for daytrip label and input fields -->
                    <div class="form-group">
                        <label>Destination address:</label>
                        <input type="text" class="form-control @error('destinationsName') is-invalid @enderror" name="destinationsName[]" id="destinationsName" required autocomplete="off" placeholder="Please start typing the address and then select the address from the list">

                        <!-- daytrip destination error reporting -->
                        @error('destinationsName')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('destinationsName') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Destination address:</label>
                        <input type="text" class="form-control @error('destinationsName') is-invalid @enderror" name="destinationsName[]" id="destinationsName" required autocomplete="off" placeholder="Please start typing the address and then select the address from the list">

                        @error('destinationsName')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('destinationsName') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>End Date:</label>
                        <input type="date" class="form-control @error('endDate') is-invalid @enderror" name="endDate" id="endDate" required>

                        @error('endDate')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('endDate') }}</strong>
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