@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">



            @csrf




            <!-- client dashboard start ------------------------------------------------------------- -->
            @if(Auth::guard('web')->check())


            <div class="row justify-content-center">

                <h2 class="tk-carlmarx im-centered">We'll Take You On A Trip</h2>
            </div>
            <div class="row justify-content-center">
                <div class="tk-carlmarx" id="title"><strong>MAKE A BOOKING</strong></div>
            </div>
            <div class="row justify-content-center">
                <a href="{{ URL::route('booking.step.one.create') }}" class="btn btn-lg" style="background: #F8E78F;">
                    <h3 class="tk-gill-sans-nova">START</h3>
                </a>
            </div>





            @endif
            <!-- client dashboard end ---------------------------------------------------------- -->




            <!-- admin dashboard start -------------------------------------------------------- -->
            @if(Auth::guard('admin')->check())
            @include('dashboard.errors')
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs tk-gill-sans-nova" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#bookings" role="tab" aria-controls="home" aria-selected="true">Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#drivers" role="tab" aria-controls="profile" aria-selected="false">Drivers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="client-tab" data-toggle="tab" href="#clients" role="tab" aria-controls="client" aria-selected="false">Clients</a>
                        </li>
                    </ul>
                    <div class="tab-content tk-gill-sans-nova" id="myTabContent">
                        <div class="tab-pane fade show active" id="bookings" role="tabpanel" aria-labelledby="home-tab">@include('dashboard.admin.readbookings', ['bookings' => $bookings])</div>
                        <div class="tab-pane fade" id="drivers" role="tabpanel" aria-labelledby="profile-tab">@include('dashboard.admin.driver.readdrivers', ['drivers' => $drivers], ['modelData' => $modelData])</div>
                        <div class="tab-pane fade" id="clients" role="tabpanel" aria-labelledby="contact-tab">@include('dashboard.client.readclients', ['clients' => $clients])</div>
                    </div>
                </div>
            </div>
            @endif
            <!-- admin dashboard end---------------------------------------------------------- -->




            <!-- human resources dashboard start ------------------------------------------------------------>
            @if(Auth::guard('hr')->check())
            @include('dashboard.errors')
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs tk-gill-sans-nova" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#admins" role="tab" aria-controls="home" aria-selected="true">Admins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#drivers" role="tab" aria-controls="profile" aria-selected="false">Drivers</a>
                        </li>
                    </ul>
                    <div class="tab-content tk-gill-sans-nova" id="myTabContent">
                        <div class="tab-pane fade show active" id="admins" role="tabpanel" aria-labelledby="home-tab">@include('dashboard.admin.readadmins', ['admins' => $admins])</div>
                        <div class="tab-pane fade" id="drivers" role="tabpanel" aria-labelledby="profile-tab">@include('dashboard.admin.driver.readdrivers', ['drivers' => $drivers], ['modelData' => $modelData])</div>
                    </div>
                </div>
            </div>
            @endif
            <!-- human resources dashboard end ------------------------------------------------------------>

        </div>
    </div>
</div>

@endsection