<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
          <a class="navbar-brand" href="./">
          <img alt="image" src="{{ asset('public/assets/img/poltek2.png')}}" width="200">  
          <!-- <img src="{{asset('public/img/poltek.png')}}" alt="Logo"></a> -->
            <!-- <a href="index.html">Stisla</a> -->
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
          <img alt="image" src="{{ asset('public/assets/img/logo_poliwangi.png')}}" width="50">   
            <!-- <a href="index.html">Stisla</a> -->
            <a class="navbar-brand" href="./"></a>
          </div>
          <div>
          <ul class="sidebar-menu">
            <li class="menu-header">BERANDA</li>
            <li class="nav-item"><a class="nav-link" href="{{url('/admin')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            @role('superadmin')
              <li class="nav-item"><a class="nav-link" href="{{url('/admin/prodi')}}"><i class="fas fa-list"></i> <span>Program Studi</span></a></li>
              <li class="nav-item"><a class="nav-link" href="{{url('/admin/jabatan')}}"><i class="fas fa-pencil-ruler"></i> <span>Jabatan</span></a></li>
              <li class="nav-item"><a class="nav-link" href="{{url('/admin/roles')}}"><i class="fas fa-th-large"></i> <span>Role</span></a></li>
              <li class="nav-item"><a class="nav-link" href="{{url('/admin/user')}}"><i class="far fa-user"></i> <span>User</span></a></li>

              
              <!-- <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-fire"></i> <span>Pelaporan</span></a></li> -->             
            </ul>
            @endrole
            
            @role('karyawan')
            <li class="nav-item"><a class="nav-link" href="{{url('/admin/profile')}}"><i class="far fa-user"></i> <span>Profile</span></a></li>
             <!-- KARYAWAN -->
             <!-- <li class="menu-header">TAMPILAN KARYAWAN</li> -->
            <li class="menu-header">PERMOHONAN SURAT</li>
              <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Surat Tugas</span></a>
                <ul class="dropdown-menu">
                  <li></li>
                  <li><a class="nav-link" href="{{url('/admin/perorangann')}}">Perorangan</a></li>
                  <li><a class="nav-link" href="{{url('/admin/kelompokk')}}">Kelompok</a></li>
                </ul>
              </li> -->
              <li class="nav-item"><a class="nav-link" href="{{url('/admin/kelompokk')}}"><i class="fas fa-columns"></i> <span>Surat Tugas</span></a></li>
              <li class="nav-item"><a class="nav-link" href="{{url('/admin/pelaporann')}}"><i class="far fa-file-alt"></i> <span>Laporan Perjadin</span></a></li>
              <!-- <li class="nav-item"><a class="nav-link" href="{{url('/admin/penugasankaryawan')}}"><i class="fas fa-fire"></i> <span>Penugasan Karyawan</span></a></li> -->
            @endrole

            @role('kajur')
            <!-- <li class="menu-header">BERANDA</li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="{{url('/admin')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li> -->
            <!-- KETUA JURUSAN -->
            <!-- <li class="menu-header">TAMPILAN KAJUR</li> -->
            <li class="menu-header">PERSETUJUAN PERMOHONAN</li>
              <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Surat Tugas</span></a>
                <ul class="dropdown-menu">
                  <li></li>
                  <li><a class="nav-link" href="{{url('/admin/perorangann')}}">Perorangan</a></li>
                  <li><a class="nav-link" href="{{url('/admin/kelompokk')}}">Kelompok</a></li>
                </ul>
              </li> -->
              <li class="nav-item"><a class="nav-link" href="{{url('/admin/kelompokk')}}"><i class="fas fa-columns"></i> <span>Surat Tugas</span></a></li>
            @endrole

            @role('sekdir')
            <!-- <li class="menu-header">BERANDA</li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="{{url('/admin')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li> -->
              <!-- SEKRETRAIS DIREKTUR -->
              <!-- <li class="menu-header">TAMPILAN SEKDIR</li> -->
              <li class="menu-header">PENGAJUAN PEMBUATAN SURAT</li>
              <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Surat Tugas</span></a>
                <ul class="dropdown-menu">
                  <li></li>
                  <li><a class="nav-link" href="{{url('/admin/perorangann')}}">Perorangan</a></li>
                  <li><a class="nav-link" href="{{url('/admin/kelompokk')}}">Kelompok</a></li>
                </ul>
              </li> -->
              <li class="nav-item"><a class="nav-link" href="{{url('/admin/kelompokk')}}"><i class="fas fa-columns"></i> <span>Surat Tugas</span></a></li>
            @endrole

            @role('kepegawaian')
            <!-- <li class="menu-header">BERANDA</li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="{{url('/admin')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li> -->
              <!-- KEPEGAWAIAN -->
              <!-- <li class="menu-header">TAMPILAN KEPEGAWAIAN</li> -->
              <li class="menu-header">PENGAJUAN PEMBUATAN SURAT</li>
              <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Surat Tugas</span></a>
                <ul class="dropdown-menu">
                  <li></li>
                  <li><a class="nav-link" href="{{url('/admin/perorangann')}}">Perorangan</a></li>
                  <li><a class="nav-link" href="{{url('/admin/kelompokk')}}">Kelompok</a></li>
                </ul>
              </li> -->
              <li class="nav-item"><a class="nav-link" href="{{url('/admin/kelompokk')}}"><i class="fas fa-columns"></i> <span>Surat Tugas</span></a></li>
              
            @endrole

            @role('keuangan')
            <!-- <li class="menu-header">BERANDA</li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="{{url('/admin')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li> -->
            <li class="nav-item"><a class="nav-link" href="{{url('/admin/pelaporann')}}"><i class="fas fa-fire"></i> <span>Laporan Perjadin</span></a></li>
            @endrole

            </div>
            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
              </a>
            </div>
        </div>
        </aside>
      </div>