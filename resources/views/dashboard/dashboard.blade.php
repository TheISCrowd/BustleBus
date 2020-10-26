@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               

                @csrf

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <!-- client dashboard start ------------------------------------------------------------- -->
                    @if(Auth::guard('web')->check())
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-auto">
                                <h2 class="tk-carlmarx im-centered">We'll Take You On A Trip</h2>
                            </div>


                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-auto">
                                <div class="tk-carlmarx" id="title"><strong>MAKE A BOOKING</strong></div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-auto">
                                <a href="{{ URL::route('booking.step.one.create') }}" class="btn btn-lg btn-default">
                                    <h3 class="tk-gill-sans-nova">START</h3>
                                </a>
                            </div>
                        </div>
                    </div>

                    @endif
                    <!-- client dashboard end ---------------------------------------------------------- -->




                    <!-- admin dashboard start -------------------------------------------------------- -->
                    @if(Auth::guard('admin')->check())
                    @include('dashboard.errors')

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
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
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="bookings" role="tabpanel" aria-labelledby="home-tab">@include('dashboard.admin.readbookings', ['bookings' => $bookings])</div>
                        <div class="tab-pane fade" id="drivers" role="tabpanel" aria-labelledby="profile-tab">@include('dashboard.admin.driver.readdrivers', ['drivers' => $drivers])</div>
                        <div class="tab-pane fade" id="clients" role="tabpanel" aria-labelledby="contact-tab">@include('dashboard.client.readclients', ['clients' => $clients])</div>
                    </div>

                    @endif
                    <!-- admin dashboard end---------------------------------------------------------- -->




                    <!-- human resources dashboard start ------------------------------------------------------------>
                    @if(Auth::guard('hr')->check())
                    @include('dashboard.errors')
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#admins" role="tab" aria-controls="home" aria-selected="true">Admins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#drivers" role="tab" aria-controls="profile" aria-selected="false">Drivers</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="admins" role="tabpanel" aria-labelledby="home-tab">@include('dashboard.admin.readadmins', ['admins' => $admins])</div>
                        <div class="tab-pane fade" id="drivers" role="tabpanel" aria-labelledby="profile-tab">@include('dashboard.admin.driver.readdrivers', ['drivers' => $drivers])</div>
                    </div>


                    @endif
                    <!-- human resources dashboard end ------------------------------------------------------------>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection