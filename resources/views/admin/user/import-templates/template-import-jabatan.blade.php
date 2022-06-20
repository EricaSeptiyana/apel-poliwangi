<table>
    <tr>
        <td>ID</td>
        <td>Nama Prodi</td>
    </tr>
    @foreach ($jabatan as $j)
        <tr>
            <td>{{ $j->id }}</td>
            <td>{{ $j->nama_jabatan }}</td>
        </tr>
    @endforeach
</table>