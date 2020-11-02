<div class="table-responsive tk-gill-sans-nova">
    <table class="table">
        <caption>List of Admin Accounts</caption>
        <tr>
            <th><strong>ID<strong></th>
            <th><strong>Name<strong></th>
            <th><strong>Email<strong></th>
        </tr>
        @foreach ($admins as $admin)
        <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->name}}</td>
            <td style="padding-right: 500px">{{$admin->email}}</td>
            <td><Button class="btn btn-warning edit" data-toggle="modal" data-target="#updateAdmin">Update</button></td>
            <td><Button class="btn btn-danger delete" data-toggle="modal" data-target="#deleteAdmin">Delete</button></td>
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
            $('#updateAdminID').val(row.find('td:eq(0)').text())
            $('#updateAdminName').val(row.find('td:eq(1)').text())
            $('#updateAdminEmail').val(row.find('td:eq(2)').text())
        });

        $('.delete').click(function() {
            row = $(this).closest('tr');
            // $('#id') is the same as document.getElementById('id');
            // here we set the <inputs> value to the data in the table with the .val()
            $('#deleteAdminId').val(row.find('td:eq(0)').text())
            $('#deleteAdminName').val(row.find('td:eq(1)').text())
            $('#deleteAdminEmail').val(row.find('td:eq(2)').text())

        });
    });
</script>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addAdmin">
    Create Admin
</button>

@include('auth.registeradmin')

<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateAdmin">Update Admin</button>-->

@include('dashboard.admin.updateadmin')

@include('dashboard.admin.deleteadmin')