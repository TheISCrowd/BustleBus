<table method = "GET" action="{{ route('admin.get.driver') }}">
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