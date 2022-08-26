<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table.static{
            position: relative;
            border: 1px solid #543535;
        }
        @page {
            size: auto;
            margin:0;
        }
    </style>
    <title>Rekap Pengajuan Surat Tugas</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Rekap Pengajuan Surat Tugas Pertanggal</b></p>
        <table class="static" align="center" rules="all" border="3px" style="width: 96px;">
            <tr>
                <th>No.</th>
                <th>Nomor Permohonan</th>
                <th>Nomor Agenda</th>
                <th>Nomor Surat Tugas</th>
                <th>Tanggal Surat</th>
                <th>Kegiatan</th>
            </tr>
            @foreach($cetaksuratpertanggal as $item)
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
    </div>
    <script type="text/javascript">
       window.print();
    </script>
</body>
</html>