<!-- Trip Planning Screen -->

@extends('layouts.app')

<script type="text/javascript" src="{{ asset('js/map.js') }}"></script>
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSjIfZl3W9pahKIKoppSpS-hbD6XlvjFc&libraries=places&callback=initMap"></script>


@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <!-- Please do not edit the blade code below this comment -->
            <div class="card">
                <form method="POST" action="{{ route('booking.step.one.post') }}">

                    @csrf

                    <div class="form-group">
                        <label>Start Date:</label>
                        <input type="date" class="form-control @error('startDate') is-invalid @enderror" name="startDate" id="startDate" required>


                        @error('startDate')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('startDate') }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Initial Collection Address:</label>
                        <input type="text" class="form-control @error('initalCollectionPoint') is-invalid @enderror" name="address" id="address" required autocomplete="off" placeholder="Please start typing the address and then select the address from the list">

                        @error('initalCollectionPoint')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('initalCollectionPoint') }}</strong>
                        </span>
                        @enderror

                        <div id="map" style="height: 0%"></div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="initalCollectionPoint" id="initalCollectionPoint">
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



                    <input type="submit" name="send" value="Next" class="btn btn-dark btn-block">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection