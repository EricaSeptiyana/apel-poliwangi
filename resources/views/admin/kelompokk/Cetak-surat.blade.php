<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pengajuan Surat Tugas</title>
    <br>
    <br>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
        @page {
            size: auto;
            margin-top: 50px;
        }
	</style>
	<center>
		<h5>Laporan Pengajuan Surat Tugas</h4>
	</center>
    <br>
	<table class='table table-bordered'>
        <tr>
            <th>No.</th>
            <th>Nomor Permohonan</th>
            <th>Nomor Agenda</th>
            <th>Nomor Surat Tugas</th>
            <th>Tanggal Surat</th>
            <th>Kegiatan</th>
        </tr>
        @foreach($rekapsurat as $item)
        @if($item->surat)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$item->nomor_permohonan}}</td>
            <td>{{$item->disposisi ? $item->disposisi->nomor_agenda : '-'}}</td>                                
            <td>{{$item->surat ? $item->surat->nomor_surattugas : '-'}}</td>                                
            <td>{{$item->tanggal_permohonan}}</td>
            <td>{{$item->jenis_kegiatan}}</td>
        </tr>
        @endif
        @endforeach
	</table>
    <script type="text/javascript">
       window.print();
    </script>
</body>
</html>