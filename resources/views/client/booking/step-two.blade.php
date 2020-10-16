<!-- Passenger Screen -->

@extends('layouts.app')

@section('content')

<div class="container">
    <form method="POST" action="{{ route('booking.step.two.post') }}">
        @csrf
        <div class="row justify-content-center">

            <div class="col-md-5">
                <div class="card">
                    <h5>How many passengers: maximum 15</h5>
                    <p>If you require more space please make another booking</p>
                    @error('maximum')
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('maximum') }}</strong>
                    </div>
                    @enderror
                    <label>Infants:</label>
                    <input type="number" class="form-control @error('maximum') is-invalid @enderror" name="infants" id="infants"  value="{{ old('infants') | 0 }}" min="0" max="15" required>

                    <label>Children:</label>
                    <input type="number" class="form-control @error('maximum') is-invalid @enderror" name="children" id="children" value="{{ old('children') | 0 }}" min="0" max="15" required>

                    <label>Adults:</label>
                    <input type="number" class="form-control @error('maximum') is-invalid @enderror" name="adults" id="adults" value="{{ old('adults') | 0 }}" min="0" max="15" required>

                    <label>Elderly:</label>
                    <input type="number" class="form-control @error('maximum') is-invalid @enderror" name="elderly" id="elderly" value="{{ old('elderly') | 0 }}" min="0" max="15" required>
                </div>

                <div class="card">
                    <label>Are any passengers disabled?:</label>
                    <input type="checkbox" class="form-control @error('disabled') is-invalid @enderror" name="disabled" id="disabled">

                    <label>Baby chairs/infant assistance?:</label>
                    <input type="checkbox" class="form-control @error('babychair') is-invalid @enderror" name="babychair" id="babychair">
                </div>
                <input type="submit" name="send" value="Next" class="btn btn-dark btn-block">
            </div>
        </div>
    </form>
</div>
@endsection