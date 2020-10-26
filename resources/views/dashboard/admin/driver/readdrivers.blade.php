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
            <td><button type="button" class="btn btn-warning edit" data-toggle="modal" data-target="#updateDriver">Update</button></td>
            <td><button type="button" class="btn btn-danger delete" data-toggle="modal" data-target="#deleteDriver">Delete</button></td>
        </tr>
        @endforeach
    </table>
</div>

<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js'></script>
<script>
     $(document).ready(function() {
   let row = null
   // $('.edit') is the same as document.getElementByClass('edit');
   $('.edit').click(function() {
     row = $(this).closest('tr');
     // $('#id') is the same as document.getElementById('id');
     // here we set the <inputs> value to the data in the table with the .val()
     $('#updateDriverID').val(row.find('td:eq(0)').text())
     $('#updateFirstName').val(row.find('td:eq(1)').text())
     $('#updateLastName').val(row.find('td:eq(2)').text())
     $('#updateEmail').val(row.find('td:eq(3)').text())
     $('#updateDateOfBirth').val(row.find('td:eq(4)').text())
     $('#updateContactNumber').val(row.find('td:eq(5)').text())
     $('#updateDateEmployed').val(row.find('td:eq(6)').text())
     $('#updateHometown').val(row.find('td:eq(7)').text())
   });

   $('.delete').click(function() {
     row = $(this).closest('tr');
     // $('#id') is the same as document.getElementById('id');
     // here we set the <inputs> value to the data in the table with the .val()
     $('#deleteDriverID').val(row.find('td:eq(0)').text())
     $('#deleteFirstName').val(row.find('td:eq(1)').text())
     $('#deleteLastName').val(row.find('td:eq(2)').text())     
   });
 });
</script>

<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addDriver">
    Create Driver
</button>



@include('auth.registerdriver')


@include('dashboard.admin.driver.updatedriver')

@include('dashboard.admin.driver.deletedriver')