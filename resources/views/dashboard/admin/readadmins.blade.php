<table>
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