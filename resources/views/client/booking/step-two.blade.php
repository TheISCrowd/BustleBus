<!-- Passenger Screen -->

@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Step buttons to navigate wizzard -->
    <div class="row justify-content-center">
        <a href="{{ URL::route('booking.step.one.create') }}" class="btn btn-default"> Locations step one </a>
        <a href="{{ URL::route('booking.step.two.create') }}" class="btn btn-default"> Passengers step two </a>
        <a href="{{ URL::route('booking.step.three.create') }}" class="btn btn-default"> Luggage step three </a>
        <a href="{{ URL::route('booking.step.four.create') }}" class="btn btn-default"> Vehciles step four </a>
    </div>

    <form method="POST" action="{{ route('booking.step.two.post') }}">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <h5>How many passengers: maximum 15</h5>
                    <p>If you require more space please make another booking</p>

                    <!-- error message for maximum number > 15 passengers -->
                    @error('maximum')
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('maximum') }}</strong>
                    </div>
                    @enderror

                    <!-- error message for baby chair required when not infant passengers -->
                    @error('babychair')
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('babychair') }}</strong>
                    </div>
                    @enderror

                    <!-- error message that no adults or elderly are on the trip -->
                    @error('parental')
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('parental') }}</strong>
                    </div>
                    @enderror

                    <!-- error message that there are zero passengers -->
                    @error('zero')
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('zero') }}</strong>
                    </div>
                    @enderror

                    <!-- passenger type input fields -->
                    <label>Infants:</label>
                    <input type="number" class="form-control @error('maximum') is-invalid @enderror" name="infants" id="infants" value="{{ old('infants') | 0 }}" min="0" max="15" required>
                    <label>Children:</label>
                    <input type="number" class="form-control @error('maximum') is-invalid @enderror" name="children" id="children" value="{{ old('children') | 0 }}" min="0" max="15" required>
                    <label>Adults:</label>
                    <input type="number" class="form-control @error('maximum') is-invalid @enderror" name="adults" id="adults" value="{{ old('adults') | 0 }}" min="0" max="15" required>
                    <label>Elderly:</label>
                    <input type="number" class="form-control @error('maximum') is-invalid @enderror" name="elderly" id="elderly" value="{{ old('elderly') | 0 }}" min="0" max="15" required>
                </div>

                <div class="card">
                    <!-- special passenger assistance fields -->
                    <label>Are any passengers disabled?:</label>
                    <input type="checkbox" class="form-control @error('disabled') is-invalid @enderror" name="disabled" id="disabled">
                    <label>infant seats:</label>
                    <input type="checkbox" class="form-control @error('babychair') is-invalid @enderror" name="babychair" id="babychair">
                </div>

                <!-- button to post form -->
                <input type="submit" name="send" value="Next" class="btn btn-dark btn-block">
            </div>
        </div>
    </form>
</div>
@endsection