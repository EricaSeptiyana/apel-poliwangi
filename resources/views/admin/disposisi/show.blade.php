<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Disposisi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <style>
    table tr .text2{
      text-align: left;
    }
    table tr .text3{
        text-align: center;
        font-size: 17px;
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
      <table width="625" class="border-bottom border-dark solid">>
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
    <!-- <tr>
      <td colspan="2"><b>_________________________________________________________________________________</b><br></td>
    </tr> -->
    <br>
    <table border="1" cellpadding="5" width="625">
        <tr>
          <td>Tanggal Terima : 
            <!-- 22 Februari 2022 -->
            {{$disposisi->tanggal_terima}}
          </td>
          <td>Nomor Agenda :</td>
          <td>{{$disposisi->nomor_agenda}}</td>
        </tr>
    </table>
    <br>
    <table cellpadding="5" width="625">
        <tr>
          <td>Jenis Disposisi &emsp;:</td>
          <td>Pengirim : 
            {{$data->jabatan_penandatangan}}
          </td>
        </tr>
        <tr>
            <td>Rahasia</td>
            <td>Nomor Surat : 
              {{$data->nomor_permohonan}}
            </td>
        </tr>
        <tr>
            <td>Penting</td>
            <td>Tanggal Surat : 
              {{$data->tanggal_permohonan}}
            </td>
        </tr>
        <tr>
            <td>Segera</td>
            <td>Lampiran : 
              {{$data->lampiran}}
            </td>
        </tr>
        <tr>
            <td>Biasa</td>
            <td>Perihal Surat : 
              {{$data->hal}}
            </td>
        </tr>
    </table>
    <br>
    <table border="1" cellpadding="5" width="625">
      <tr bgcolor="white">
          <th>DARI</th>
          <th>KEPADA</th>
          <th>ISI DISPOSISI</th>
          <th>PARAF</th>
      </tr>
      <tr>
        <td>Direktur</td>
        <td>
            Wadir I <br>
            Plt. Wadir II <br>
            Plt. Wadir III <br>
        </td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>
            Wadir I <br>
            Plt. Wadir II <br>
            Plt. Wadir III <br>
        </td>
        <td>
            Ka. Jur............. <br>
            Ka. Prodi........... <br>
            Ka. Unit............ <br>
            Koord............... <br>
            .................... <br>
            ....................
        </td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>
            Ka. Jur............. <br> 
            Ka. Prodi........... <br> 
            Ka. Unit............ <br> 
            Koord............... <br>
            .................... <br>
            ....................
        </td>
        <td>
            .................... <br>
            .................... <br>
            .................... <br>
            .................... <br>
            .................... <br>
            ....................
        </td>
        <td></td>
        <td></td>
      </tr>
      
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