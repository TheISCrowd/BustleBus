@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- $user variable is passed with login view to determine which user is logged in -->

                    @if(Auth::guard('web')->check())

                    {{ __('Client logged in!') }}

                    @endif


                    @if(Auth::guard('admin')->check())

                    {{ __('Admin logged in!') }}

                    @include ('dashboard.admin.driver.readdrivers')

                    @include ('dashboard.driver.new-driver')
                    @endif

                    <!-- human resources so $user == 'hr' -->
                    @if(Auth::guard('hr')->check())

                    {{ __('Human Resources logged in!') }}


                    <div class="container">
                        @include('dashboard.admin.readadmins', ['admins' => $admins])
                        <a class="btn btn-primary" data-toggle="collapse" href="#collapseAdmin" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Create Admin
                        </a>

                        <div class="collapse" id="collapseAdmin">
                            <div class="card card-body">
                                @include('auth.registerbland', ['url' => 'admin'])
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        @include('dashboard.admin.driver.readdrivers', ['drivers' => $drivers])
                        <a class="btn btn-primary" data-toggle="collapse" href="#collapseDriver" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Create Driver
                        </a>
                        <div class="collapse" id="collapseDriver">
                            <div class="card card-body">
                                @include('dashboard.admin.driver.new-driver')
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection