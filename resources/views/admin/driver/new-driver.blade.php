@extends('layouts.auth')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <!--simple form for entering driver details into the drivers table.-->
        <!--####important####-->
        <!--If edited please ensure that all names and ID's are the same otherwise the backend wont work.-->
            <form method="POST" action="{{ route('new.driver.post') }}">

                @csrf
                <h1>Enter New Driver Credentials</h1>
                <hr>
                <div class="form-group row">
                    <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                    <div class="col-md-6">
                        <input id="fistName" type="text" class="form-control @error('fistName') is-invalid @enderror" name="firstName" value="{{ old('fistName') }}" placeholder="(John)" required autofocus>

                        @error('firstName')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('firstName') }}</strong>
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
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('lastName') }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="(johndoe@bustlebus.com)" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="dateOfBirth" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>
                    <div class="col-md-6">
                        <input id="dateOfBirth" type="date" name="dateOfBirth" required autofocus>

                        @error('dateOfBirth')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('dateOfBirth') }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="contactNumber" class="col-md-4 col-form-label text-md-right">{{ __('Cell') }}</label>

                    <div class="col-md-6">
                        <input id="contactNumber" type="text" class="form-control @error('contactNumber') is-invalid @enderror" name="contactNumber" value="{{ old('contactNumber') }}" placeholder="(0845884750)" required autofocus>

                        @error('contactNumber')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('contactNumber') }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="dateEmployed" class="col-md-4 col-form-label text-md-right">{{ __('Date Employed') }}</label>
                    <div class="col-md-6">
                        <input id="dateEmployed" type="date" name="dateEmployed" required autofocus>

                        @error('dateEmployed')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('dateEmployed') }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="hometown" class="col-md-4 col-form-label text-md-right">{{ __('Home Town') }}</label>

                    <div class="col-md-6">
                        <input id="hometown" type="text" class="form-control @error('hometown') is-invalid @enderror" name="hometown" value="{{ old('hometown') }}" placeholder="(Cape Town)" required autofocus>

                        @error('hometown')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('hometown') }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="licenseCode" class="col-md-4 col-form-label text-md-right">{{ __('License Code') }}</label>

                    <div class="col-md-6">
                        <select id="licenseCode" type="text" class="form-control @error('licenseCode') is-invalid @enderror" name="licenseCode">
                            <option value="B">B</option>
                            <option value="EB">EB</option>
                            <option value="C1">C1</option>
                            <option value="C">C</option>
                            <option value="EC1">EC1</option>
                            <option value="EC">EC</option>
                        </select>
                        @error('licenseCode')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('licenseCode') }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                @endisset

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="8 charater password minimum" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role=alert>
                            <strong>{{ $errors->first('password') }}</strong>
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
                <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
            </form>
        </div>
    </div>
</div>
@endsection