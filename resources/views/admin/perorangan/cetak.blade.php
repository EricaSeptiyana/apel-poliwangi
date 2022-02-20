@extends('admin.layouts.master')

@section('content')

<div class="section-body">
    <div class="section-header">
        <h5>{{$pagename}}</h5>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{route('perorangan.index')}}">Surat Tugas</a></div>
        <div class="breadcrumb-item">{{ $pagename }}</div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
        <center class="m-5">
            <tr>
            <table width="725">
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
            <td colspan="2"><b>_________________________________________________________________________________________________________</b><br></td>
            </tr>
            <br>
            <table class="text-center" width="625">
            <tr>
                <td class="text3"><b>SURAT TUGAS</b></td>
            </tr>
            <tr>
                <td class="text3">Nomor: 651725/PL/KP/2022</td>
            </tr>
            </table>
            <br>
            <table class="text-justify" width="625">
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
            <table class="text-justify">
                <tr>
                    <td>Nama &emsp; :</td>
                    <td width="557">Suntiwi</td>
                </tr>
                <tr>
                    <td>NIP/NIK :</td>
                    <td width="557"> 1234567890111213</td>
                </tr>
                <tr>
                    <td>Jabatan &ensp; :</td>
                    <td width="557"></td>
                </tr>
            </table>
            <br>
            <table width="625">
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
                <td width="559">Seminar</td>
            </tr>
            <tr>
                <td>Waktu :</td>
                <td width="559"> 10.00 WIB - selesai</td>
            </tr>
            <tr>
                <td>Tempat :</td>
                <td width="559"> Ruang E1.7 Gedung 454 Politeknik Negeri Banyuwangi</td>
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
        </div>
    </div>
</div>

@endsection