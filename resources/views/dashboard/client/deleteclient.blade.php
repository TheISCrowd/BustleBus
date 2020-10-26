<div class="modal fade" id="deleteClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Client Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('delete.client.post') }}">

                    @csrf
                    <div class="form-group row">
                        <label for="deleteDriverID" class="col-md-4 col-form-label text-md-right">{{ __('Driver ID') }}</label>

                        <div class="col-md-6">
                            <input id="deleteDriverID" type="text" class="form-control @error('driverID') is-invalid @enderror" name="driverID" value="{{ old('driverID') }}" placeholder="(1)" required autofocus>

                            @error('driverID')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('driverID') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="deleteFirstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                        <div class="col-md-6">
                            <input id="deleteFirstName" type="text" class="form-control @error('fistName') is-invalid @enderror" name="firstName" value="{{ old('fistName') }}" placeholder="(John)" required autofocus>

                            @error('firstName')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('firstName') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="deleteLastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                        <div class="col-md-6">
                            <input id="deleteLastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" placeholder="(Doe)" required autofocus>

                            @error('lastName')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('lastName') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
            
                </form>
            </div>
        </div>
    </div>
</div>