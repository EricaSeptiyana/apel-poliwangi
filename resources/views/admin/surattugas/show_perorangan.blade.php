<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Tugas Perorangan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <style>
      * {
      font-family: 'Times New Roman', Times, serif;
    }
    table tr .text2{
      text-align: left;
    }
    table tr .text3{
        text-align: center;
        font-size: 18px;
      }
    table tr td {
      text-align: justify;
      font-size: 15px;
    }
    table tr .text {
      text-align: right;
      font-size: 15px;
    }
    @page {
      size: auto;
      margin:0;
    }

  </style>
</head>
<body>

  <center>
  <tr>
      <table width="625" class="border-bottom border-dark solid">
        <td><img src="{{ asset('public/assets/img/logo_poliwangi.png')}}" width="105" height="105"></td>
        <td class="kopContent">
          <center>
            <p style="font-size: 16pt; margin:auto">KEMENTRIAN PENDIDIKAN, KEBUDAYAAN,<br>RISET, DAN TEKNOLOGI</p>
            <p style="font-size: 14pt;margin:auto"><b>POLITEKNIK NEGERI BANYUWANGI</b></p>
            <p style="font-size: 12pt;margin:auto">Jl. Raya Jember kilometer 13 Labanasem, Kabat, Banyuwangi, 68461</p>
            <p style="font-size: 12pt;margin:auto">Telepon / Faks : (0333) 636780</p>
            <p style="font-size: 12pt;margin:auto">Email : poliwangi@poliwangi.ac.id ; Website : http//www.poliwangi.ac.id</p>
            <center>
        </td>
      </table>
    </tr>
    <tr>
      <!-- <td colspan="2"><b>_________________________________________________________________________________</b><br></td> -->
    </tr>

    <br>
    <table width="300">
      <tr >
        <td style="text-align:center;" class="text3" ><b>SURAT TUGAS</b></td>
      </tr>
      <tr>
        <!-- <td class="text3">Nomor</td>
        <td>: {{$surat? $surat->nomor_surattugas : '-'}}</td>
       -->
       <td class="text3">Nomor: {{$surat? $surat->nomor_surattugas: '-'}}</td>
      </tr>
    </table>
    <br>
    <table width="625">
      <tr>
        <td>
          <font size="3">{{$surat->pembuka}}</font>
        </td>
      </tr>
    </table>
    <!-- <br>
    <table width="625">
      <tr>
        <td>
          <font size="2"> Dalam rangka pelaksanaan Koordinasi Tenaga Kependidikan di lingkungan Politeknik Negeri Banyuwangi
            <br>Tahun 2021, maka kami mengundang Bapaka/ Ibu untuk hadir pada: </font>
        </td>
      </tr>
    </table> -->
    <br>
    <table>
      <tr>
        <td>Nama</td>
        <td width="567">: {{$karyawan->name}}</td>
      </tr>
      <tr>
        <td>NIP/NIK </td>
        <td width="567">: {{$karyawan->nip}}</td>
      </tr>
      <tr>
        <td>Jabatan </td>
        <td width="567">: {{$karyawan->jabatan}}</td>
      </tr>
    </table>
    <br>
    <table width="624">
      <tr>
        <td>
          <font size="3"> ditugaskan untuk mengikuti: </font>
        </td>
      </tr>
    </table>
    <br>
    <table>
      <tr style="vertical-align: top;">
      <td >Kegiatan </td>
        <td width="570" >: {{$data->jenis_kegiatan}}</td>
      </tr>
      <tr>
        <td>Waktu </td>
        <td width="570">: 
        {{Carbon\Carbon::parse($data->waktu_pelaksanaan)->isoFormat('dddd, D MMMM Y')}}

          {{$data->waktu_selesai ? '- '.Carbon\Carbon::parse($data->waktu_selesai)->isoFormat('dddd, D MMMM Y') : ' '}}
      </td>
      </tr>
      <tr>
        <td>Tempat </td>
        <td width="570">: {{$data->tempat}}</td>
      </tr>
    </table>
    <br>
    <table width="619">
      <tr>
        <td>
          <font size="3"> {{$surat->penutup}}.</font>
        </td>
      </tr>
      <br>
      <table width="625">
        <tr>
          <td width="400"></td>
          <td class="text2">Banyuwangi, {{Carbon\Carbon::parse($data->tanggal_permohonan)->isoFormat('D MMMM Y')}}.</td>
        </tr>
        <br>
        <tr>
          <td width="400"></td>
      
          <td width="230" class="text2"> {{$surat? $surat->nama_jabatan: '-'}}
          <br>
          <br>
          <br>
          <br>
          {{$surat? $surat->name: '-'}}
            <br>
            NIP/NIK  {{$surat? $surat->nip: '-'}}
        </td>
        </tr>
      </table>
    </table>
  </center>
  <div class="container-lg text-center mt-4 mb-4 pt-4">
      <!-- <button name="cetak" type="button" id="cetak" value="Cetak" onclick="Cetakan()" class="btn btn-primary" style="margin-right: 4cm;">cetak</button>
      <a href="{{ url('admin/kelompokk/') }}" name="selanjutnya" id="selanjutnya" class="btn btn-success">Kembali</a> -->
  </div>
  <script type="text/javascript">
       window.print();
  </script>
  <!-- <script>
        function Cetakan() {
            var x = document.getElementsByName("cetak");
            var y = document.getElementsByName("selanjutnya");
            for (i = 0; i < x.length; i++) {
                x[i].style.visibility = "hidden";
                // y[i].style.visibility = "hidden";
            }
            for (i = 0; i < y.length; i++) {
                y[i].style.visibility = "hidden";
            }
            

            var css = '@page { size: portrait; }',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');

            style.type = 'text/css';
            style.media = 'print';

            if (style.styleSheet){
            style.styleSheet.cssText = css;
            } else {
            style.appendChild(document.createTextNode(css));
            }

            head.appendChild(style);
            window.print();
            // alert("Jangan di tekan tombol Selanjutnya sebelum dokumen selesai tercetak!");
            for (i = 0; i < x.length; i++) {
                x[i].style.visibility = "visible";
            }
            for (i = 0; i < y.length; i++) {
                y[i].style.visibility = "visible";
            }
            
        }
  </script> -->
 
</body>
</html>