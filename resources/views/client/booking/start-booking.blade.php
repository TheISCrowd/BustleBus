<!-- Start Booking Page -->

@extends('layouts.app')

@section('content')
<a href="{{ URL::route('booking.step.one.create') }}" class="btn btn-default"> Start Booking </a>

<!--
<div class="container mt-5">


    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('booking.store') }}">

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
            <label>End Date:</label>
            <input type="date" class="form-control @error('endDate') is-invalid @enderror" name="endDate" id="endDate" required>

            @error('endDate')
            <span class="invalid-feedback" role=alert>
                <strong>{{ $errors->first('endDate') }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Number of Passengers:</label>
            <input type="number" class="form-control @error('numberOfPassengers') is-invalid @enderror" name="numberOfPassengers" id="numberOfPassengers" required placeholder="Please insert the number of passengers between 1-25">

            @error('numberOfPassengers')
            <span class="invalid-feedback" role=alert>
                <strong>{{ $errors->first('numberOfPassengers') }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Initial Collection Point:</label>
            <input type="text" class="form-control @error('initalCollectionPoint') is-invalid @enderror" name="address" id="address" required autocomplete="off" placeholder="Please start typing the address and then select the address from the list">

            @error('initalCollectionPoint')
            <span class="invalid-feedback" role=alert>
                <strong>{{ $errors->first('initalCollectionPoint') }}</strong>
            </span>
            @enderror

            <div id="map" style="height: 100%"></div>
        </div>

        <div class="form-group">
            <input type="hidden" name="initalCollectionPoint" id="initalCollectionPoint">
        </div>

        <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
    </form>
</div>
-->
@endsection