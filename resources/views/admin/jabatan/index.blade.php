@extends('admin.layouts.master')

@section('content')

<section class="section">
<div class="section-header">
    <h5>{{$pagename}}</h5>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('kelompok.index')}}">Jabatan</a></div>
      <div class="breadcrumb-item">{{ $pagename }}</div>
    </div>
</div>
  <!-- <div class="content mt-3"> -->
    <div class="animated fadein">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
              @if(session()->get('sukses'))
                <div class="alert alert-succes" style="color:green">
                  {{session()->get('sukses')}}
                </div>
              @endif
                <div class="card-header">
                  <h4>{{$pagename}}</h4>
                  <div class="card-header-action">
                        <div class="input-group">
                          <a href="{{route('jabatan.create')}}" class="btn btn-primary pull-right"> Tambah </a>
                        </div>
                  </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12 col-">
                <div class="card">
                  <div class="card-header">
                    <h4>Full Width</h4>
                    <div class="card-header-action">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                    </div>
                  </div>
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tr>
                          <th>No</th>
                          <th>Nama Jabatan</th>
                          <!-- <th>Tertuju</th> -->
                          <!-- <th>Instansi</th> -->
                          <!-- <th>Agenda</th> -->
                          <!-- <th>Hari/Tanggal</th> -->
                          <!-- <th>Pukul</th> -->
                          <!-- <th>Tempat</th> -->
                          <!-- <th>Tanggal Surat</th> -->
                          <th>Aksi</th>
                          <!-- <th>Delete</th>
                          <th>Cetak</th>
                          <th>Download</th> -->
                        </tr>
                        <!-- <tr> -->
                          @foreach($data as $row)
                           <tr> 
                              <td>{{++$i}}</td>
                              <td>{{$row->nama_jabatan}}</td>
                              <!-- <td>{{$row->instansi}}</td> -->
                              <!-- <td>{{$row->agenda}}</td> -->
                              <!-- <td>{{$row->hari_tanggal}}</td> -->
                              <!-- <td>{{$row->pukul}}</td> -->
                              <!-- <td>{{$row->tempat}}</td> -->
                              <!-- <td>{{$row->tanggal_surat}}</td> -->
                              <td>
                                <!-- <div class="row"> -->
                                  <!-- <div class="col-md-2 d-grid"> -->

                                    <div class="d-flex justify-content-evenly">
                                      <a href="{{route('jabatan.edit',$row->id)}}" class="btn btn-primary"> Edit </a>
                                      <form action="{{route('jabatan.destroy', $row->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger mx-2" type="submit"> Hapus </button>
                                      </form>
                                      <!-- <a href="#" class="btn btn-info"> Cetak </a> -->
                                      <!-- <a href="#" class="btn btn-success"> Download </a> -->
                                    </div>
                                    <!-- <div class="col-md-2">
                                      
                                      <form action="{{route('jabatan.destroy', $row->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"> Hapus </button>
                                      </form>
                                  </div> -->
                                <!-- </div> -->
                              </td>
                                
                                <!-- <a href="#" class="btn btn-danger"> Hapus </a></td> -->
                              <!-- <td><a href="#" class="btn btn-info"> Cetak </a></td>
                              <td><a href="#" class="btn btn-success"> Download </a></td> -->
                              <!-- <td><a href="#" class="btn btn-icon btn-dark"> <i class="far fa-file"></i> </a></td> -->
                              <!-- <td><div class="badge badge-success">Active</div></td>
                              <td><a href="#" class="btn btn-secondary">Detail</a></td> -->
                            </tr>
                          @endforeach
                        <!-- </tr> -->
                        <!-- <tr>
                          <td>2</td>
                          <td>Hasan Basri</td>
                          <td>2017-01-09</td>
                          <td><div class="badge badge-success">Active</div></td>
                          <td><a href="#" class="btn btn-secondary">Detail</a></td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Kusnadi</td>
                          <td>2017-01-11</td>
                          <td><div class="badge badge-danger">Not Active</div></td>
                          <td><a href="#" class="btn btn-secondary">Detail</a></td>
                        </tr> -->
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                </div>
              </div>
              </div>
            </div>
          </div>
        </section>

@endsection