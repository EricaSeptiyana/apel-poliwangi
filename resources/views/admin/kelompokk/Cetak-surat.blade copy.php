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
    <center>
    <tr>
      <table width="625" class="border-bottom border-dark solid">
        <td><img src="{{ asset('public/assets/img/logo_poliwangi.png')}}" width="105" height="105"></td>
        <td>
          <center>
              <font size="5">KEMENTRIAN PENDIDIKAN, KEBUDAYAAN,<br>RISET, DAN TEKNOLOGI</font><br>
              <!-- <font size="4">RISET, DAN TEKNOLOGI</font><br> -->
              <font size="5"><b>POLITEKNIK NEGERI BANYUWANGI</b></font><br>
              <font size="3">Jl. Raya Jember kilometer 13 Labanasem, Kabat, Banyuwangi, 68461</font><br>
              <font size="3">Telepon / Faks : (0333) 636780</font><br>
              <font size="3">Email : poliwangi@poliwangi.ac.id ; Website : http//www.poliwangi.ac.id</font><br>
          <center>
        </td>
        <!-- <td colspan="2"> -->
      </table>
    </tr>
    <br>
    <br>
    <table width="300">
        <div class="form-group">
            <p align="center"><b>Rekap Pengajuan Surat Tugas</b></p>
            <table class="static" align="center" rules="all" border="3px" style="width: 200px;">
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
        </div>
    </table>
    </center>
    <script type="text/javascript">
       window.print();
    </script>
</body>
</html>
