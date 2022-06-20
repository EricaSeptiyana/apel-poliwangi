<table>
    <tr>
        <td>ID</td>
        <td>Nama Prodi</td>
    </tr>
    @foreach ($prodi as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->nama_prodi }}</td>
        </tr>
    @endforeach
</table>