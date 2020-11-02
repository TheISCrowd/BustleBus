<div class="modal fade" id="deleteAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Admin Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('delete.admin.post') }}">

                    @csrf
                    <div class="form-group row">
                        <label for="deleteAdminId" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>

                        <div class="col-md-6">
                            <input id="deleteAdminId" type="text" class="form-control @error('driverID') is-invalid @enderror" name="adminID" value="{{ old('driverID') }}" placeholder="(1)" required autofocus>

                            @error('driverID')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('driverID') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="deleteAdminName" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="deleteAdminName" type="text" class="form-control @error('fistName') is-invalid @enderror" name="name" value="{{ old('fistName') }}" placeholder="(John)" required autofocus>

                            @error('firstName')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('firstName') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="deleteAdminEmail" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                        <div class="col-md-6">
                            <input id="deleteAdminEmail" type="text" class="form-control @error('lastName') is-invalid @enderror" name="email" value="{{ old('lastName') }}" placeholder="(Doe)" required autofocus>

                            @error('lastName')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('lastName') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
            
                </form>
            </div>
        </div>
    </div>
</div>