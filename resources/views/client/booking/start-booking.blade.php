<!-- Start Booking Page -->

@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <a href="{{ URL::route('booking.step.one.create') }}" class="btn btn-default"> Start Booking </a>
</div>

@endsection