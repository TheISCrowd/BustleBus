@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <!-- client dashboard start ------------------------------------------------------------- -->
                    @if(Auth::guard('web')->check())

                    {{ __('Client logged in!') }}

                    @endif
                    <!-- client dashboard end ---------------------------------------------------------- -->




                    <!-- admin dashboard start -------------------------------------------------------- -->
                    @if(Auth::guard('admin')->check())
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Drivers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">@include('dashboard.admin.readbookings', ['bookings' => $bookings])</div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">@include('dashboard.admin.driver.readdrivers', ['drivers' => $drivers])</div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                    </div>


                    <!-- Bookings container -->
                    <div class="container">
                        <!-- Bookings table -->
                        
                    </div>

                    <!--drivers container -->
                    <div class="container">
                        <!-- drivers table -->
                        
                    </div>

                    @endif
                    <!-- admin dashboard end---------------------------------------------------------- -->




                    <!-- human resources dashboard start ------------------------------------------------------------>
                    @if(Auth::guard('hr')->check())
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Admins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Drivers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">@include('dashboard.admin.readadmins', ['admins' => $admins])</div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">@include('dashboard.admin.driver.readdrivers', ['drivers' => $drivers])</div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                    </div>


                    @endif
                    <!-- human resources dashboard end ------------------------------------------------------------>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection