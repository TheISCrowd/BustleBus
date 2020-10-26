<div class="modal fade" id="updateClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('update.client.post') }}" >
                    @csrf
                    <div class="form-group row">
                        <label for="updateClientID" class="col-md-4 col-form-label text-md-right">{{ __('Client ID') }}</label>

                        <div class="col-md-6">
                            <input id="updateClientID" type="text" class="form-control @error('clientID') is-invalid @enderror" name="clientID" value="{{ old('clientID') }}" placeholder="(1)" required autofocus>

                            @error('clientID')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('clientID') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateClientName" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="updateClientName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="(John)" required autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    @isset($url)
                    @else
                    <div class="form-group row">
                        <label for="updateClientSurname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                        <div class="col-md-6">
                            <input id="updateClientSurname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" placeholder="(Doe)" required autofocus>

                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="updateClientCell" class="col-md-4 col-form-label text-md-right">{{ __('Cell') }}</label>

                        <div class="col-md-6">
                            <input id="updateClientCell" type="text" class="form-control @error('cell') is-invalid @enderror" name="cell" value="{{ old('cell') }}" placeholder="(0845884750)" required autofocus>

                            @error('cell')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    @endisset

                    <div class="form-group row">
                        <label for="updateClientEmail" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="updateClientEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="(johndoe@bustlebus.com)" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>    
        </div>
    </div>
</div>
