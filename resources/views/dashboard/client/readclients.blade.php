<div class="table-responsive tk-gill-sans-nova">
    <table class="table">
        <caption>List of clients</caption>
        <tr>
            <th><strong>client ID<strong></th>
            <th><strong>First Name<strong></th>
            <th><strong>Last Name<strong></th>
            <th><strong>Cell<strong></th>
            <th><strong>e-mail<strong></th>
        </tr>
        @foreach ($clients as $client)
        <tr>
            <td>{{$client->id}}</td>
            <td>{{$client->name}}</td>
            <td>{{$client->surname}}</td>
            <td>{{$client->cell}}</td>
            <td>{{$client->email}}</td>
            <td>{{$client->contactNumber}}</td>
            <td><Button type = "button" class="btn btn-warning edit" data-toggle="modal" data-target="#updateClient">Update</button></td>
            <td><button type = "button" class="btn btn-danger delete" data-toggle="modal" data-target="#deleteClient">Delete</button></td>
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
     $('#updateClientID').val(row.find('td:eq(0)').text())
     $('#updateClientName').val(row.find('td:eq(1)').text())
     $('#updateClientSurname').val(row.find('td:eq(2)').text())
     $('#updateClientCell').val(row.find('td:eq(3)').text())
     $('#updateClientEmail').val(row.find('td:eq(4)').text())
   });

   $('.delete').click(function() {
     row = $(this).closest('tr');
     // $('#id') is the same as document.getElementById('id');
     // here we set the <inputs> value to the data in the table with the .val()
     $('#deleteClientID').val(row.find('td:eq(0)').text())
     $('#deleteName').val(row.find('td:eq(1)').text())
     $('#deleteClientSurname').val(row.find('td:eq(2)').text())
     
   });
 });
</script>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success tk-gill-sans-nova" data-toggle="modal" data-target="#addClient">
    Create Client
</button>


@include('auth.registerclient')



@include('dashboard.client.updateclient')

@include('dashboard.client.deleteclient')



