<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Perjalanan Dinas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <style>
       * {
      font-family: 'Times New Roman', Times, serif;
    }
 
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
 .wrapContent {
      position: relative;
      top: -20px;
 
    }
   
.main-content    td{
      padding: 10px;
      
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
    <table width="650">
      <tr>
        <td class="text3">
            <b>LAPORAN PERJALANAN DINAS</b>
        </td>
      </tr>
      <tr>
        <td class="text3">
            <b>{{$data->judul_laporan}}</b>
        </td>
      </tr>
    </table>
    <br>
    <!-- <table width="625">
      <tr>
        <td>
          <font size="3">Yang bertanda tangan di bawah ini, Direktur Politeknik Negeri Banyuwangi menugaskan Pegawai sebagai berikut: </font>
        </td>
      </tr>
    </table> -->
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
    <table width="625" class="main-content" style="margin-left: 10px; text-align: left; margin-top:-130px;">
        <tr style="vertical-align: top;">
          
          <td >I. Dasar Pelaksanaan</td>
          <td>:
          {{$data->dasar_pelaksanaan}}
          </td>
          <!-- <td width="549">Suntiwi</td> -->
        </tr>
  
      <br>
      <tr style="vertical-align: top;">
        <td >II. Maksud Perjalanan Dinas</td>
        <td>:
        {{$data->maksud_perjalanandinas}}
        </td>
        <!-- <td width="549">Suntiwi</td> -->
      </tr>
      <br>
      <tr>
        <td width="270">III. Dinas/Instansi yang dikunjungi</td>
        <td>:
        {{$data->instansi}}
        </td>
        <!-- <td width="549">Suntiwi</td> -->
      </tr>
      <br>
      <tr style="vertical-align: top;">
      <!-- isoFormat('dddd, D MMMM Y'); -->
        <td>IV. Waktu Pelaksanaan</td>
        <td>:
        {{Carbon\Carbon::parse($data->waktu_mulai)->isoFormat('dddd, D MMMM Y')}}
          
          {{$data->waktu_selesai ? '- '.Carbon\Carbon::parse($data->waktu_selesai)->isoFormat('dddd, D MMMM Y') : ' '}}

        </td>
        <!-- <td width="549">Suntiwi</td> -->
      </tr>
      <br>
      <tr style="vertical-align: top;">
        <td>V. Hasil</td>
        <td widht="300" >: {{$data->hasil}}
        </td>
        <!-- <td width="549">Suntiwi</td> -->
      </tr>
    </table>
    <table width="625">
      <tr >
        <td width="282"></td>
        <td class="penutup">
            <font size="3" >
            {{$data->penutup}}
            </font>
        </td>
      </tr>
      <br>
      <table width="600" style="margin-bottom: 400px;">
        <tr>
        <td width ="400"></td>
          <td class="text2">Banyuwangi,
            {{Carbon\Carbon::parse($data->tanggal_surat)->isoFormat('D MMMM Y')}}
          </td>
        </tr>
        <br>
        <tr >
          <td width ="400"></td>
              <td class="text2">Yang Membuat,  
                <br> 
              @empty($data->ttd)
              <br>
              @else
              <br>
              <img src="{{ asset('public/file/'.$data->ttd)}}"  height="70">
           
              @endempty
              <br>{{$data->name}}
            </td>
              <td class="text2"></td> 
        </tr>
        <tr>
        <td width ="625"></td>
           <td width="250" class="text2"> NIP. {{$data->nip}}</td>
        </tr>
        
      </table>
    </table>
  </center>
  
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

    <br>
    <tr style="margin-left: 10px; text-align: left;">
    <table width="625">
      <tr>
        <td class="text3">
            <b>FOTO KEGIATAN PERJALANAN DINAS</b>
        </td>
      </tr>
    </table>
    <br>
    @empty($data->foto_kegiatan)
    <td></td>
    @else
    <td><img src="{{ asset('fotokegiatan1/'.$data->foto_kegiatan)}}"  height="300"></td>
    <br>
    @endempty
    <br>
    @empty($data->foto_kegiatan2)
    <td></td>
    @else
    <td><img src="{{ asset('fotokegiatan2/'.$data->foto_kegiatan2)}}"  height="300"></td>
    <br>
    @endempty
    <br>
    @empty($data->foto_kegiatan3)
    <td></td>
    @else
    <td><img src="{{ asset('fotokegiatan3/'.$data->foto_kegiatan3)}}"  height="300"></td>
    <br>
    @endempty
        </tr>
  </center>
  <div class="container-lg text-center mt-4 mb-4 pt-4">
      <!-- <button name="cetak" type="button" id="cetak" value="Cetak" onclick="Cetakan()" class="btn btn-primary" style="margin-right: 4cm;">cetak</button> -->
      <!-- <a href="{{ url('admin/pelaporann/') }}" name="selanjutnya" id="selanjutnya" class="btn btn-success">Kembali</a> -->
  </div>
  <script type="text/javascript">
       window.print();
  </script>
  <!-- JavaScript Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
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

</script> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>
    var words = [];

    function getWords(elements) {
      elements.contents().each(function() {
        if ($(this).contents().length > 0) return getWords($(this));
        if ($(this).text()) words = words.concat($(this).text().split(" "));
      })

    }

    getWords($(".kegiatanContent"));
    console.log(words);
    const kegiatan = $(".headerContent")
    
    if (words[1].length > 7) {
      kegiatan.addClass('wrapContent');
      
    }
  </script>
</body>
</html>