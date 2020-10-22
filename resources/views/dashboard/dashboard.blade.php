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

                    <!-- client so $user == 'client' -->
                    @if($user == 'client')

                    {{ __('Client logged in!') }}

                    @endif

                    <!-- admin so $user == 'admin' -->
                    @if($user == 'admin')
                    
                    {{ __('Admin logged in!') }}

                        @include ('dashboard.admin.driver.readdrivers')
                        @include ('dashboard.driver.new-driver')
                    @endif

                    <!-- human resources so $user == 'hr' -->
                    @if($user == 'hr')

                    {{ __('Human Resources logged in!') }}

                        @include('dashboard.hr.readadmins')
                        
                        @include ('dashboard.admin.driver.readdrivers')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection