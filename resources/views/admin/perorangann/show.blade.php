<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <title>Surat Permohonan Perorangan</title> -->
  <title>  </title>
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
          <center class="">
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
      <!-- <hr style="height:10px;border:none;color:#333;background-color:#333;"> -->
      <!-- <td colspan="2"><b>_________________________________________________________________________________</b><br></td> -->
      <!-- <td colspan="2"></td> -->
    </tr>
    <br>
    <table>
      <tr>
        <td>Nomor &emsp; :</td>
        <td width="549">
          {{$data->nomor_permohonan}}
        </td>
      </tr>
      <tr>
        <td>Lampiran :</td>
        <td width="549">
          {{$data->lampiran}}
        </td>
      </tr>
      <tr>
        <td>Hal &emsp; &emsp; :</td>
        <td width="549">
          {{$data->hal}}
        </td>
      </tr>
    </table>
    <br>
    <table width="625">
      <tr>
        <td>
          <font size="3">
            Yth. Direktur Politeknik Negeri Banyuwangi
          </font>
          <br>
          <font size="3">
            di tempat
          </font>
        </td>
        
      </tr>
    </table>
    <br>
    <table width="625">
        <tr>
            <td>
            <font size="3">
              {{$data->pembuka}}
            </font>
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
        <td>Nama &emsp; &ensp;:</td>
        <td width="549">
          {{$data->user->name}}
        </td>
      </tr>
      <tr>
        <td>NIP/NIK &emsp;:</td>
        <td width="549">
          {{$data->user->nip}}
        </td>
      </tr>
      <tr>
        <td>Jabatan &emsp; :</td>
        <td width="549">
          {{$data->jabatan}}
        </td>
      </tr>
    </table>
    <br>
    <table width="624">
      <tr>
        <td>
          <font size="3">
            yang akan dilaksanakan pada :
          </font>
        </td>
      </tr>
    </table>
    <br>
    <table>
      <tr>
        <td>
          Hari, Tanggal :
        </td>
        <td width="520"> 
          {{$hari}},
          {{$tanggal}}
          - 
          {{$data->waktu_selesai}}
        </td>
      </tr>
      <tr>
        <td>Pukul &emsp; &emsp; &ensp;:</td>
        <td width="520"> 
          {{$data->pukul_pelaksanaan}}
          - selesai
        </td>
        <!-- <td width="20">- selesai</td> -->
      </tr>
      <tr>
        <td>Tempat &emsp; &emsp; :</td>
        <td width="520">
          {{$data->tempat}}
        </td>
      </tr>
    </table>
    <!-- <br> -->
    <table width="619">
      <tr>
        <td>
          <!-- <font size="3"> Maka dengan ini kami mengajukan permohonan surat tugas untuk panitia karyawan program penjajakan kerjasama tersebut. Demikian surat permohonan ini kami sampaikan. Atas perhatian Bapak, kami mengucapkan terima kasih. </font> -->
          <font size="3">
            {{$data->penutup}}
          </font>
        </td>
      </tr>
      <br>
      <table width="600">
        <tr>
          <td width="400"></td>
          <td class="text2">
            Banyuwangi, 
            {{$data->tanggal_permohonan}}
          <!-- {{$data->tanggal_permohonan}} -->
          </td>
        </tr>
        <br>
        <tr>
          <td width="400"></td>
          <td class="text2">
            {{$data->jabatan_penandatangan}}
            ,
            <br><br><br>
            {{$data->nama_penandatangan}}
          </td>
        </tr>
        <tr>
            <td width="400"></td>
            <td class="text2">
              NIP./NIK.
              {{$data->nip_penandatangan}}
            </td>
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