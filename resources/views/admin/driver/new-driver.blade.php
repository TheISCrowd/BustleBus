@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @isset($url)
            <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                @else
                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                    @endisset
                    @csrf
                    <h1 style = "text-align:center;">Enter New Driver Credentials</h1>
                    <hr>
                    <div class="form-group row">
                        <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                        <div class="col-md-6">
                            <input id="fistName" type="text" class="form-control @error('name') is-invalid @enderror" name="firstName" value="{{ old('name') }}" placeholder="(John)" required autofocus>

                            @error('firstName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    @isset($url)
                    @else
                    <div class="form-group row">
                        <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                        <div class="col-md-6">
                            <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" placeholder="(Doe)" required autofocus>

                            @error('lastName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="(johndoe@bustlebus.com)" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class= "form-group row">
                    <label for="dateOfBirth" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>
                        <div class="col-md-6">
                            <input id="dateOfBirth" type="date" name="dateOfBirth"   required autofocus>

                            <!--@error('cell')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror-->
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contactNumber" class="col-md-4 col-form-label text-md-right">{{ __('Cell') }}</label>

                        <div class="col-md-6">
                            <input id="contactNumber" type="text" class="form-control @error('cell') is-invalid @enderror" name="cell" value="{{ old('cell') }}" placeholder="(0845884750)" required autofocus>

                            @error('contactNumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class= "form-group row">
                    <label for="dateEmployed" class="col-md-4 col-form-label text-md-right">{{ __('Date Employed') }}</label>
                        <div class="col-md-6">
                            <input id="dateEmployed" type="date" name="dateEmployed"   required autofocus>

                            <!--@error('cell')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror-->
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="hometown" class="col-md-4 col-form-label text-md-right">{{ __('Home Town') }}</label>

                        <div class="col-md-6">
                            <input id="hometown" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('hometown') }}" placeholder="(Cape Town)" required autofocus>

                            @error('hometown')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="licenseCode" class="col-md-4 col-form-label text-md-right">{{ __('License Code') }}</label>

                        <div class="col-md-6">
                            <select id="licenseCode" type="text" class="form-control @error('licenseCode') is-invalid @enderror" name="licenseCode" >
                                <option value = "B">B</option>
                                <option value = "EB">EB</option>
                                <option value = "C1">C1</option>
                                <option value = "C">C</option>
                                <option value = "EC1">EC1</option>
                                <option value = "EC">EC</option>
                            </select>
                            @error('licenseCode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    @endisset

                    <!--Might add this to database later.
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="(johndoe@bustlebus.com)" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>-->

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="8 charater password minimum" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repeat the password" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection