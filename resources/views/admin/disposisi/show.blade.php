<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Disposisi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <style>
    * {
      font-family: 'Times New Roman', Times, serif;
    }

    table tr .text2 {
      text-align: left;
    }

    table tr .text3 {
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
      margin: 0;
    }

    .border-table {
      border: 1px solid black;
    }
    input[type=radio]{
      border: 0px;
  
      height: 8px;
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
    <!-- <tr>
      <td colspan="2"><b>_________________________________________________________________________________</b><br></td>
    </tr> -->
    <br>
    <table class="border-table" cellpadding="5" width="625">
      <tr>
        <td class="border-table">Tanggal Terima :
          <!-- 22 Februari 2022 -->
          {{Carbon\Carbon::parse($disposisi->tanggal_terima)->isoFormat('D MMMM Y')}}
        </td>
        <td class="border-table">Nomor Agenda : </td>
        <td width="170">{{$disposisi->nomor_agenda}}</td>
      </tr>
    </table>
    <br>
    <table cellpadding="5" width="625">
      <tr>
        <td>Jenis Disposisi :</td>

        <td>Pengirim </td>
        <td>: {{$data->nama_jabatan}} - {{$data->nama_prodi}} </td>

      </tr>
      <tr>
        <td><input type="radio" name="" id=""> Rahasia</td>
        <td>Nomor Surat</td>
        <td>: {{$data->nomor_permohonan}}</td>
      </tr>
      <tr>
        <td><input type="radio" name="" id=""> Penting</td>
        <td>Tanggal Surat</td>
        <td>: {{Carbon\Carbon::parse($data->tanggal_permohonan)->isoFormat('D MMMM Y')}} </td>

      </tr>
      <tr>
        <td><input type="radio" name="" id=""> Segera</td>
        <td>Lampiran</td>
        <td>: {{$data->lampiran}}</td>
      </tr>
      <tr style=" vertical-align:top; ">
        <td><input type="radio" name="" id=""> Biasa</td>
        <td>Perihal Surat</td>
        <td width="370">{{': '.$data->hal}}</td>

      </tr>
    </table>
    <br>
    <table class="border-table" cellpadding="5" width="625">
      <tr bgcolor="white">
        <th class="border-table" style="text-align:center; font-weight: normal;">DARI</th>
        <th class="border-table" style="text-align:center;font-weight: normal;">KEPADA</th>
        <th class="border-table" style="text-align:center;font-weight: normal;">ISI DISPOSISI</th>
        <th class="border-table" style="text-align:center;font-weight: normal;">PARAF</th>
      </tr>
      <tr>
        <td class="border-table" style="font-weight: bold;">Direktur
        <br>
        <br>
        <br>
     
        </td>
        <td class="border-table">
          <input type="radio"   name="" id=""> Wadir I <br>
          <input type="radio" name="" id=""> Plt. Wadir II <br>
          <input type="radio" name="" id=""> Plt. Wadir III <br>
          <br>
          <br>
        </td>
        <td class="border-table"></td>
        <td class="border-table"></td>
      </tr>
      <tr>
        <td class="border-table">
          <input type="radio" name="" id=""> Wadir I <br>
          <input type="radio" name="" id=""> Plt. Wadir II <br>
          <input type="radio" name="" id=""> Plt. Wadir III <br>
          <br>
          <br>
          <br>
          <br>
        </td>
        <td class="border-table" >
          <input type="radio" name="" id=""> Ka. Jur...............<br>
          <input type="radio" name="" id=""> Ka. Prodi...........<br>
          <input type="radio" name="" id=""> Ka. Unit..............<br>
          <input type="radio" name="" id=""> Koord.................<br>
          <input type="radio" name="" id=""> ...........................<br>
          <input type="radio" name="" id=""> ...........................<br>
          <br>
        </td>
        <td class="border-table" width="300"></td>
        <td class="border-table"></td>
      </tr>
      <tr>
        <td class="border-table">
          <input type="radio" name="" id=""> Ka. Jur............. <br>
          <input type="radio" name="" id=""> Ka. Prodi........... <br>
          <input type="radio" name="" id=""> Ka. Unit............ <br>
          <input type="radio" name="" id=""> Koord............... <br>
          <input type="radio" name="" id=""> ...........................<br>
          <input type="radio" name="" id=""> ...........................<br>
          <br>
          <br>
        </td>
        <td class="border-table">
          <input type="radio" name="" id=""> ...........................<br>
          <input type="radio" name="" id=""> ...........................<br>
          <input type="radio" name="" id=""> ...........................<br>
          <input type="radio" name="" id=""> ...........................<br>
          <input type="radio" name="" id=""> ...........................<br>
          <input type="radio" name="" id=""> ...........................<br>
          <br>
          <br>
        </td>
        <td class="border-table"></td>
        <td class="border-table"></td>
      </tr>

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