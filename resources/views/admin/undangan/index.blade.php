@extends('admin.layouts.master')

@section('content')

 <!-- General CSS Files -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Boostrap core CSS -->
  <!-- <link rel="stylesheet" href="{{ asset('public/assets/css/boostrap.css')}}"> -->
  <!-- <link rel="stylesheet" href="{{ asset('public/assets/dataTables/dataTables.min.css')}}"> -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('public/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('public/assets/css/components')}}.css">

<section class="section">
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
                          <a href="{{route('undangan.create')}}" class="btn btn-primary pull-right"> Tambah </a>
                        </div>
                  </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12">
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
                          <th>Nomor Surat</th>
                          <th>Tertuju</th>
                          <th>Instansi</th>
                          <th>Agenda</th>
                          <th>Hari/Tanggal</th>
                          <!-- <th>Pukul</th> -->
                          <th>Tempat</th>
                          <th>Tanggal Surat</th>
                          <th>Aksi</th>
                          <!-- <th>Delete</th>
                          <th>Cetak</th>
                          <th>Download</th> -->
                        </tr>
                        <!-- <tr> -->
                          @foreach($data as $row)
                           <tr>
                              <td>{{++$i}}</td>
                              <td>{{$row->nomor}}/{{$row->kode_surat}}/{{$row->jenis_surat}}/{{$row->tahun_surat}}</td>
                              <td>{{$row->tertuju}}</td>
                              <td>{{$row->instansi}}</td>
                              <td>{{$row->agenda}}</td>
                              <td>{{$row->hari_tanggal}}</td>
                              <!-- <td>{{$row->pukul}}</td> -->
                              <td>{{$row->tempat}}</td>
                              <td>{{$row->tanggal_surat}}</td>
                              <td>
                                <div class="d-flex justify-content-evenly">
                                  <a href="{{route('undangan.edit',$row->id)}}" class="btn btn-primary"> Edit </a>
                                  <a href="#" class="btn btn-info mx-2"> Cetak </a>
                                  <a href="#" class="btn btn-success"> Download </a>
                                  <form action="{{route('undangan.destroy', $row->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger mx-2" type="submit"> Hapus </button>
                                  </form>
                                  <!-- <a href="#" class="btn btn-info"> Cetak </a>
                                  <a href="#" class="btn btn-success"> Download </a> -->
                                </div>
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


<!-- General JS Scripts -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('public/assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('public/assets/node_modules/jquery-ui-dist/jquery-ui.min.js')}}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('public/assets/js/scripts.js')}}"></script>
  <script src="{{ asset('public/assets/js/custom.js')}}"></script>
  <!-- <script src="{{ asset('public/assets/dataTables/datatables.min.js')}}"></script> -->

  <!-- Page Specific JS File -->
  <script src="{{ asset('public/assets/js/page/components-table.js')}}"></script>

@endsection