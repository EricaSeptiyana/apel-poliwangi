<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Permohonan Kelompok</title>
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
      /* font-style: ; */
    }
    table tr .text {
      text-align: right;
      font-size: 15px;
    }
    .center {
  margin-left: auto;
  margin-right: auto;
    text-align: justify;
}
.wrapContent {
      position: relative;
      top: -20px;
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
    <!-- <tr>
      <td colspan="2"><b>_________________________________________________________________________________</b><br></td>
    </tr> -->
    <br>
    
    <table>
      <tr>
        <td>Nomor</td>
        <td width="549">
          : {{$data->nomor_permohonan}}
        </td>
      </tr>
      <tr>
        <td>Lampiran </td>
        <td width="549">
          : {{$data->lampiran}}
        </td>
      </tr>
      <tr>
        <td class="headerContent">Hal</td>
        <td class="kegiatanContent" width="549">
         : {{$data->hal}}
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
            <!-- <font size="3">Sehubungan dengan akan dilaksanakannya kegiatan Penandatanganan dan Peran Perguruan Tinggi dalam Mendukung Geopark di Banyuwangi yang akan dilaksanakan pada :</font> -->
                <font size="3">
                  {{$data->pembuka}}
                </font>
            </td>
        </tr>
    </table>
    <br>
    <table>
      <!-- <tr>
        <td>Hari, Tanggal :</td>
        <td width="520"> Jumat, 25 Februari 2022 - 26 Februari 2022</td>
      </tr> -->
      <tr>
        <td>Hari, Tanggal </td>
        <td width="520"> 
          :
        {{Carbon\Carbon::parse($data->waktu_pelaksanaan)->isoFormat('dddd, D MMMM Y')}}

          {{$data->waktu_selesai ? '- '.Carbon\Carbon::parse($data->waktu_selesai)->isoFormat('dddd, D MMMM Y') : ' '}}
      </td>
      </tr>
      <tr>
        <td>Pukul</td>
        <td width="520"> 
        : {{Carbon\Carbon::parse($data->pukul_pelaksanaan)->format('h:i')}}
          - selesai
        </td>
      </tr>
      <tr>
        <td>Tempat</td>
        <td width="520">
          : {{$data->tempat}}
        </td>
      </tr>
    </table>
    <br>
    <table width="619">
      <tr>
        <td>
            <font size="3">
              {{$data->penutup}}
            </font>
        </td>
      </tr>
      <br>
      
      <table  width="600">
        <br>
        <tr>
          <td width="400"></td>
          <td class="text2">
            Banyuwangi, 
            {{Carbon\Carbon::parse($data->tanggal_permohonan)->isoFormat('D MMMM Y')}}
        </td>
        </tr>
        <br>
        <tr>
          <td width="400"></td>
          <td class="text2">
            {{$data->nama_jabatan}}
            ,
         
            @empty($data->ttd)
            <br><br>
            @else
            <br>
            <img src="{{ asset('public/file/'.$data->ttd)}}"  height="70">
            <br>
            @endempty
            <br>
            {{$data->name}}
          </td>
        </tr>
        <tr>
            <td width="400"></td>
            <td width="230" class="text2">
              NIP./NIK. {{$data->nip}}
            </td>
          </tr>
      </table>
    </table>
  </center>
  
  <center>
    <tr >
    <table style="margin-top: 250px;" width="625" class="border-bottom border-dark solid">
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
    <br>
    <!-- <table border="1"  class="center" cellpadding="5" width="625"> -->
    <tr>
        <td class="text3 " >
          <b>List Data Nama Karyawan Kegiatan {{$data->jenis_kegiatan}}</b>
        </td>
    </tr>
    <br>
    <!-- </table> -->
         
    <table border="1"  class="center" cellpadding="5" width="625" >
       
      <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NIP/NIK</th>
          <th>Jabatan</th>
      </tr>
      
      @foreach($karyawan as $datakaryawan)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$datakaryawan->name}}</td>
        <td>{{$datakaryawan->nip}}</td>
        <td>{{$datakaryawan->jabatan}}</td>
      </tr>
      @endforeach
    </table>
  </center>
  <div class="container-lg text-center mt-4 mb-4 pt-4">
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
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>
    var words = [];

    function getWords(elements) {
      elements.contents().each(function() {
        if ($(this).contents().length > 0) return getWords($(this));
        if ($(this).text()) words = words.concat($(this).text().split(","));
      })

    }

    getWords($(".kegiatanContent"));
    console.log(words[1].length);
    const kegiatan = $(".headerContent")
    if (words[1].length > 9) {
      kegiatan.addClass('wrapContent');
    }
  </script>

</body>
</html>