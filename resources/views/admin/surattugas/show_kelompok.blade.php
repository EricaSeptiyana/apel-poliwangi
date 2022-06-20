<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Tugas Kelompok</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <style>
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
      </table>
    </tr>
    <tr>
      <!-- <td colspan="2"><b>_________________________________________________________________________________</b><br></td> -->
    </tr>
    <br>
    <table width="625">
      <tr>
        <td class="text3"><b>SURAT TUGAS</b></td>
      </tr>
      <tr>
        <td class="text3">Nomor: 651725/PL/KP/2022</td>
      </tr>
    </table>
    <br>
    <table width="625">
      <tr>
        <td>
          <font size="3">Yang bertanda tangan di bawah ini, Direktur Politeknik Negeri Banyuwangi menugaskan Pegawai sebagai berikut: </font>
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
    <table border="1" cellpadding="5" width="625">
      <tr>
        <!-- <th rowspan="1" bgcolor="yellow">No</th> -->
        <!-- <th colspan="3" bgcolor="#00ff80">Nama</th> -->
        <!-- <th colspan="2" bgcolor="red">NIP/NIK</th> -->
        <!-- <th colspan="2" bgcolor="green">Jabatan</th> -->
      </tr>
      <tr bgcolor="grey">
          <th>No</th>
          <th>Nama</th>
          <th>NIP/NIK</th>
          <th>Jabatan</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Wiyono</td>
        <td>1234567890111213</td>
        <td>Dosen</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Suntiwi</td>
        <td>1234567890111213</td>
        <td>Dosen</td>
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
      <tr>
        <td>Kegiatan :</td>
        <td width="550">Seminar</td>
      </tr>
      <tr>
        <td>Waktu :</td>
        <td width="550"> 10.00 WIB - selesai</td>
      </tr>
      <tr>
        <td>Tempat :</td>
        <td width="550"> Ruang E1.7 Gedung 454 Politeknik Negeri Banyuwangi</td>
      </tr>
    </table>
    <br>
    <table width="619">
      <tr>
        <td>
          <font size="3"> Demikian Surat Tugas ini untuk dilaksanakan dengan penuh tanggung jawab, serta dipersiapkan dengan sebaik-baiknya.</font>
        </td>
      </tr>
      <br>
      <table width="600">
        <tr>
          <td width="400"></td>
          <td class="text2">Banyuwangi, 13 Januari 2022</td>
        </tr>
        <br>
        <tr>
          <td width="400"></td>
          <td class="text2">Direktur,<br><br><br><br><br><br>Bapak Wiyono</td>
        </tr>
      </table>
    </table>
  </center>
  <div class="container-lg text-center mt-4 mb-4 pt-4">
      <button name="cetak" type="button" id="cetak" value="Cetak" onclick="Cetakan()" class="btn btn-primary" style="margin-right: 4cm;">cetak</button>
      <a href="{{ url('admin/kelompokk/') }}" name="selanjutnya" id="selanjutnya" class="btn btn-success">Kembali</a>
  </div>
  <script>
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
  </script>
</body>
</html>