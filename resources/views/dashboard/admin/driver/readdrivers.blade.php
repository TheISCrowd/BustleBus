@if(session()->has('successdriver'))
<div class="alert alert-success">
    {{ session()->get('successdriver') }}
</div>
@endif

<div class="table-responsive">
    <table class="table">
        <caption>List of Drivers</caption>
        <tr>
            <th><strong>Driver ID<strong></th>
            <th><strong>First Name<strong></th>
            <th><strong>Last Name<strong></th>
            <th><strong>e-mail<strong></th>
            <th><strong>Date of Birth<strong></th>
            <th><strong>Cell<strong></th>
            <th><strong>Date Employed<strong></th>
            <th><strong>Home Town<strong></th>
        </tr>
        @foreach ($drivers as $driver)
        <tr>
            <td>{{$driver->driverID}}</td>
            <td>{{$driver->firstName}}</td>
            <td>{{$driver->lastName}}</td>
            <td>{{$driver->email}}</td>
            <td>{{$driver->dateOfBirth}}</td>
            <td>{{$driver->contactNumber}}</td>
            <td>{{$driver->dateEmployed}}</td>
            <td>{{$driver->hometown}}</td>
        </tr>
        @endforeach
    </table>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDriver">
    Create Driver
</button>

@include('auth.registerdriver')