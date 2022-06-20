@extends('admin.layouts.master')
@section('title', 'APEL Poliwangi')
@section('content')
<section class="section">
  <!-- background biru -->
    <!-- <div class="col-12 mb-4">
      <div class="hero bg-primary text-white">
        <div class="hero-inner">
          <h2>Welcome, Ujang!</h2>
          <p class="lead">You almost arrived, complete the information about your account to complete registration.</p>
          <div class="mt-4">
            <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Account</a>
          </div>
        </div>
      </div>
    </div> -->
    
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Dashboard</h4>
          </div>
          <div class="card-body">
            <div class="empty-state">
              <h6 class="mb-5">APLIKASI ADMINISTRASI PELAYANAN SURAT TUGAS</h6>
              <img class="img-fluid" src="{{asset('public/assets/img/logo_poliwangi.png')}}" alt="image" width="140">
              <h6 class="mt-5">POLITEKNIK NEGERI BANYUWANGI</h6>
              <p class="lead">
                Jl. Raya Jember KM.13 Kabat, Labanasem Banyuwangi, Kabupaten Banyuwangi
              </p>
              <!-- <a href="#" class="btn btn-warning mt-4">Try Again</a>
              <a href="#" class="mt-4 bb">Need Help?</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- background gambar -->
    <div class="row">
      <div class="col-12 mb-4">
        <div class="hero text-white hero-bg-image hero-bg-parallax" data-background="{{asset('public/assets/img/unsplash/andre-benz-1214056-unsplash.jpg')}}">
          <div class="hero-inner">
            <h2>
              Selamat Datang,
              {{$datalogin->name}}
              <!-- {{$datalogin->username}} -->
            </h2>
            <p class="lead">
              <!-- You almost arrived, complete the information about your account to complete registration. -->
              Selamat datang di Aplikasi Administrasi Pelayanan Surat Tugas Politeknik Negeri Banyuwangi.
            </p>

            @role('karyawan')
            <div class="mt-4">
              <a href="{{url('/admin/profile')}}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Ubah Profile </a>
            </div>
            @endrole
          </div>
        </div>
      </div>
    </div>

</section>
@endsection