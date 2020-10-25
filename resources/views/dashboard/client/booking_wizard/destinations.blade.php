<!-- Trip Planning Screen -->
@extends('layouts.app')
<script type="text/javascript" src="{{ asset('js/autocomplete.js') }}"></script>
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSjIfZl3W9pahKIKoppSpS-hbD6XlvjFc&libraries=places&callback=initMap"></script>
@section('content')
<div class="container">
    <!-- Step buttons to navigate wizzard -->
    <div class="row justify-content-center">
        <a href="{{ URL::route('booking.step.one.create') }}" class="btn btn-default"> Locations step one </a>
        <a href="#" class="btn btn-default"> Passengers step two </a>
        <a href="#" class="btn btn-default"> Luggage step three </a>
        <a href="#" class="btn btn-default"> Vehciles step four </a>
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
                    <div id="daytrips" class="form-group">
                        <label>Leaving from:</label>
                        <input type="text" class="form-control @error('initalCollectionPoint') is-invalid @enderror" name="initalCollectionPoint" id="initalCollectionPoint" required autocomplete="off" placeholder="Please start typing the address and then select the address from the list">

                        <!-- hidden field that accepts address as coordinates -->
                        <input type="hidden" name="bookingLatLong" id="bookingLatLong">

                        <!-- start destination error reporting -->
                        @error('initalCollectionPoint')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('initalCollectionPoint') }}</strong>
                        </span>
                        @enderror
                    </div>


                    <!-- destination address for daytrip label and input fields -->
                    <div class="form-group">
                        <label>Final Destination is:</label>
                        <input type="text" class="form-control @error('destination') is-invalid @enderror" name="destinationName[]" id="destination" required autocomplete="off" placeholder="Please start typing the address and then select the address from the list">
                        <input type="hidden" name="destinationLatLong[]" id="destinationLatLong">

                        <!-- daytrip destination error reporting -->
                        @error('destinationsName')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('destinationsName') }}</strong>
                        </span>
                        @enderror
                    </div>

                    <br>
                    <br>

                    <div class="form-group">
                        <label>Overnight stops:</label>
                        <input type="text" class="form-control @error('destination') is-invalid @enderror" name="destinationName[]" id="daytrip" autocomplete="off" placeholder="Please start typing the address and then select the address from the list">
                        Click "Add" to add the destination to your trip.
                        <a id="add">Add</a>
                        <input type="text" name="destinationLatLong[]" id="daytripLatLong">
                    </div>

                    <!-- Script -->
                    <script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js'></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $("#add").click(function() {
                                if ($("#daytripLatLong").is(':empty')) {
                                    var address = $("<input/>", {
                                        type: "text",
                                        class: "form-control",
                                        name: "destinationsName[]",
                                        value: $("#daytrip").val()
                                    });

                                    var coord = $("<input/>", {
                                        type: "text",
                                        class: "form-control",
                                        name: "daytripLatLong[]",
                                        value: $("#destinationLatLong").val()
                                    });

                                    var removeLink = $("<span/>").html("X").click(function() {
                                        $(address).remove();
                                        $(coord).remove();
                                        $(this).remove();
                                    });

                                    $("#daytrips").append("<br><label>Leaving from:<label/>").append(address).append(coord).append(removeLink);
                                    $("#daytrip").val('');
                                    $("#bookingLatLong").val('');
                                }
                            });
                        });
                    </script>

                    <script>

                    </script>

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