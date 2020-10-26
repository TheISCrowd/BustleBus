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
                        <label for="deleteClientID" class="col-md-4 col-form-label text-md-right">{{ __('Client ID') }}</label>

                        <div class="col-md-6">
                            <input id="deleteClientID" type="text" class="form-control @error('clientID') is-invalid @enderror" name="clientID" value="{{ old('clientID') }}" placeholder="(1)" required autofocus>

                            @error('clientID')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('clientID') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="deleteName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                        <div class="col-md-6">
                            <input id="deleteName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="(John)" required autofocus>

                            @error('name')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="deleteClientSurname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                        <div class="col-md-6">
                            <input id="deleteClientSurname" type="text" class="form-control @error('lastName') is-invalid @enderror" name="surname" value="{{ old('surname') }}" placeholder="(Doe)" required autofocus>

                            @error('surname')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('surname') }}</strong>
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