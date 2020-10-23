<!-- admin created successfully -->
@if(session()->has('successadmin'))
<div class="alert alert-success">
    {{ session()->get('successadmin') }}
</div>
@endif

<div class="table-responsive" style="height: 200px; overflow:scroll;">
    <table class="table">
        <caption>List of Admin Accounts</caption>
        <tr>
            <th><strong>Admin ID<strong></th>
            <th><strong>Name<strong></th>
            <th><strong>e-mail<strong></th>
        </tr>

        @foreach ($admins as $admin)
        <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
        </tr>

        @endforeach
    </table>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAdmin">
    Create Admin
</button>

@include('auth.registeradmin')