<div class="modal fade" id="updateDriver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Driver user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('update.driver.post') }}">

                    @csrf
                    <div class="form-group row">
                        <label for="updateDriverID" class="col-md-4 col-form-label text-md-right">{{ __('Driver ID') }}</label>

                        <div class="col-md-6">
                            <input id="updateDriverID" type="text" class="form-control @error('driverID') is-invalid @enderror" name="driverID" value="{{ old('driverID') }}" placeholder="(1)" required autofocus>

                            @error('driverID')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('driverID') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="updateFirstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                        <div class="col-md-6">
                            <input id="updateFirstName" type="text" class="form-control @error('fistName') is-invalid @enderror" name="firstName" value="{{ old('fistName') }}" placeholder="(John)" required autofocus>

                            @error('firstName')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('firstName') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="updateLastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                        <div class="col-md-6">
                            <input id="updateLastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" placeholder="(Doe)" required autofocus>

                            @error('lastName')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('lastName') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="updateEmail" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="updateEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="(johndoe@bustlebus.com)" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="updateDateOfBirth" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>
                        <div class="col-md-6">
                            <input id="updateDateOfBirth" type="date" name="dateOfBirth" required autofocus>

                            @error('dateOfBirth')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('dateOfBirth') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="updateContactNumber" class="col-md-4 col-form-label text-md-right">{{ __('Cell') }}</label>

                        <div class="col-md-6">
                            <input id="updateContactNumber" type="text" class="form-control @error('contactNumber') is-invalid @enderror" name="contactNumber" value="{{ old('contactNumber') }}" placeholder="(0845884750)" required autofocus>

                            @error('contactNumber')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('contactNumber') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="updateDateEmployed" class="col-md-4 col-form-label text-md-right">{{ __('Date Employed') }}</label>
                        <div class="col-md-6">
                            <input id="updateDateEmployed" type="date" name="dateEmployed" required autofocus>

                            @error('dateEmployed')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('dateEmployed') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="updateHometown" class="col-md-4 col-form-label text-md-right">{{ __('Home Town') }}</label>

                        <div class="col-md-6">
                            <input id="updateHometown" type="text" class="form-control @error('hometown') is-invalid @enderror" name="hometown" value="{{ old('hometown') }}" placeholder="(Cape Town)" required autofocus>

                            @error('hometown')
                            <span class="invalid-feedback" role=alert>
                                <strong>{{ $errors->first('hometown') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="updateLicenseCode" class="col-md-4 col-form-label text-md-right">{{ __('License Code') }}</label>

                        <div class="col-md-6">
                            <select id="updateLicenseCode" type="text" class="form-control @error('licenseCode') is-invalid @enderror" name="licenseCode">
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

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>