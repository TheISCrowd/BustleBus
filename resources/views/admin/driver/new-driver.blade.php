@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('new.driver.post') }}">

                @csrf

                <div class="form-group">
                    <label>name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required>


                    @error('name')
                    <span class="invalid-feedback" role=alert>
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @enderror
                </div>

                <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
            </form>
        </div>
    </div>
</div>
@endsection