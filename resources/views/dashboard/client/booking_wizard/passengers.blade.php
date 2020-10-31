<!-- Passenger Screen -->

@extends('layouts.app')

@section('content')

<div class="container tk-gill-sans-nova">
    <div class="row ">
        <div class="col-md-5 rcorners2 shadow" style="background-color: #F8F8F8;">
            <h3 class="tk-gill-sans-nova"><strong>How Many Passengers</strong></h3>
            <br>

            <form method="POST" action="{{ route('booking.step.two.post') }}">
                @csrf

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
                <span class="tk-gill-sans-nova">Infants:</span>
                <input type="number" class="form-control form-control-sm @error('maximum') is-invalid @enderror" name="infants" id="infants" value="{{ $modelData['infants'] | 0}}" min="0" max="15" required>
                <span class="tk-gill-sans-nova"> Children:</span>
                <input type="number" class="form-control form-control-sm @error('maximum') is-invalid @enderror" name="children" id="children" value="{{ $modelData['children'] | 0}}" min="0" max="15" required>
                <span class="tk-gill-sans-nova">Adults:</span>
                <input type="number" class="form-control form-control-sm @error('maximum') is-invalid @enderror" name="adults" id="adults" value="{{ $modelData['adults'] | 0 }}" min="0" max="15" required>
                <span class="tk-gill-sans-nova">Elderly:</span>
                <input type="number" class="form-control form-control-sm @error('maximum') is-invalid @enderror" name="elderly" id="elderly" value="{{ $modelData['elderly'] | 0 }}" min="0" max="15" required>

                <br>

                <!-- special passenger assistance fields -->
                <span class="tk-gill-sans-nova">Disabled passengers? </span>
                <input type="checkbox" style="vertical-align: -0.3em;" class="@error('disabled') is-invalid @enderror" name="disabled" id="disabled" @if ($modelData['disabled'] == "on") checked @endif>
                <br>
                <span class="tk-gill-sans-nova">Infant chairs? </span>
                <input type="checkbox" style="vertical-align: -0.3em" class="@error('babychair') is-invalid @enderror" name="babychair" id="babychair" @if ($modelData['babychair'] > 0) checked @endif>

               
                <br>
               <br>
                <!-- button to post form -->
                <input type="submit" style="margin-bottom: 0.7em; margin-top: 0.7em;" name="send" value="Next" class="btn btn-dark btn-block tk-gill-sans-nova">

            </form>

            <a href="{{ URL::route('booking.step.one.create') }}" class="btn" style="background: #F8E78F;"> Locations </a>
            <a href="{{ URL::route('booking.step.two.create') }}" class="btn" style="background: #F8E78F;"> Passengers </a>

        </div>
    </div>


</div>
@endsection