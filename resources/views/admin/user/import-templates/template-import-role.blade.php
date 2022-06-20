<table>
    <tr>
        <th>ID</th>
        <th>Nama Role</th>
    </tr>
    @foreach ($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
        </tr>
    @endforeach
</table>