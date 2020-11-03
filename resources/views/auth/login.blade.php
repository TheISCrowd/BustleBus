@extends('layouts.app')
<style>
    .card {
        font-size: 1.1em;
    }

    .card-body {
        background: #F8F8F8;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Please do not edit the blade code below this comment -->
            <div class="card tk-gill-sans-nova">
                <div class="card-header"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</div>

                <div class="card-body">
                    @isset($url)
                    <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                        @else
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @endisset
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
                <!-- Please do not edit the blade code above this comment -->
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Please do not edit the blade code below this comment -->
            <div class="card tk-gill-sans-nova">
                <div class="card-header"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Demo Login Details') }}</div>
                <div class="card-body">
                    <div class="col">
                        @isset($url)
                        @if($url == 'hr')
                        <span><strong>E-mail Address:</strong></span>
                        <span id="emailfill">superuser@bustlebus.com</span>
                        <br>
                        <span><strong>Password:</strong></span>
                        <span>password</span>
                        <br>
                        <br>
                        <button id="fillfields" class="btn btn-primary">
                            {{ __('Autofill login fields') }}
                        </button>
                        @else
                        <span><strong>E-mail Address:</strong></span>
                        <span id="emailfill">admin@bb.com</span>
                        <br>
                        <span><strong>Password:</strong></span>
                        <span>password</span>
                        <br>
                        <br>
                        <button id="fillfields" class="btn btn-primary">
                            {{ __('Autofill login fields') }}
                        </button>
                        @endif
                        @else
                        <span><strong>E-mail Address:</strong></span>
                        <span id="emailfill">johndoe@gmail.com</span>
                        <br>
                        <span><strong>Password:</strong></span>
                        <span>password</span>
                        <br>
                        <br>
                        <a id="fillfields" class="btn btn-primary" role="button">
                            {{ __('Autofill login fields') }}
                        </a>
                        @endisset
                    </div>
                </div>
                <!-- Please do not edit the blade code above this comment -->
            </div>
        </div>
    </div>
</div>

<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js'></script>
<script>
    $(document).ready(function() {
        $('#fillfields').click(function() {
            $('#email').val($('#emailfill').html());
            $('#password').val('password');
        });
    });
</script>
@endsection