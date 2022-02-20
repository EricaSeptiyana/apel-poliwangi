@extends('admin.layouts.master')

@section('content')

<section class="section">
<div class="section-header">
    <h5>{{$pagename}}</h5>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('kelompok.index')}}">Surat Tugas</a></div>
      <div class="breadcrumb-item">{{ $pagename }}</div>
    </div>
</div>
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
                          <a href="{{route('kelompok.create')}}" class="btn btn-primary pull-right"> Tambah </a>
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
                          <th>Anggota 1</th>
                          <th>Anggota 2</th>
                          <th>Kegiatan</th>
                          <th>Waktu pelaksanaan</th>
                          <th>Tempat</th>
                          <th>Tanggal Surat</th>
                          <th>Aksi</th>
                        </tr>
                        @foreach($data as $row)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$row->nomor}}/{{$row->kode_surat}}/{{$row->jenis_surat}}/{{$row->tahun_surat}}</td>
                            <td>{{$row->nama}}</td>
                            <td>{{$row->nama}}</td>
                            <td>{{$row->jenis_kegiatan}}</td>
                            <td>{{$row->waktu_mulai}} sampai {{$row->waktu_selesai}}</td>
                            <td>{{$row->tempat}}</td>
                            <td>{{$row->tanggal_surat}}</td>
                            <!-- <td><div class="badge badge-success">Active</div></td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td> -->
                            <td>
                                <div class="d-flex justify-content-evenly">
                                  <a href="{{route('kelompok.edit',$row->id)}}" class="btn btn-primary"> Edit </a>
                                  <!-- <a href="#" class="btn btn-info"> View </a> -->
                                  <a href="#" class="btn btn-info mx-2"> Cetak </a>
                                  <a href="#" class="btn btn-success"> Download </a>
                                  <form action="{{route('kelompok.destroy', $row->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger mx-2" type="submit"> Hapus </button>
                                  </form>
                                  <!-- <a href="#" class="btn btn-info"> Cetak </a>
                                  <a href="#" class="btn btn-success"> Download </a> -->
                                </div>
                            </td>
                          </tr>
                          @endforeach
                        <!-- </tr>
                        <tr>
                          <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                              <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td>Create a mobile app</td>
                          <td class="align-middle">
                            <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                              <div class="progress-bar bg-success" data-width="100"></div>
                            </div>
                          </td>
                          <td>
                            <img alt="image" src="{{ asset('public/assets/img/avatar/avatar-5.png')}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                          </td>
                          <td>2018-01-20</td>
                          <td><div class="badge badge-success">Completed</div></td>
                          <td><a href="#" class="btn btn-secondary">Detail</a></td>
                        </tr>
                        <tr>
                          <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                              <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td>Redesign homepage</td>
                          <td class="align-middle">
                            <div class="progress" data-height="4" data-toggle="tooltip" title="0%">
                              <div class="progress-bar" data-width="0"></div>
                            </div>
                          </td>
                          <td>
                            <img alt="image" src="{{ asset('public/assets/img/avatar/avatar-1.png')}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Nur Alpiana">
                            <img alt="image" src="{{ asset('public/assets/img/avatar/avatar-3.png')}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Hariono Yusup">
                            <img alt="image" src="{{ asset('public/assets/img/avatar/avatar-4.png')}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Bagus Dwi Cahya">
                          </td>
                          <td>2018-04-10</td>
                          <td><div class="badge badge-info">Todo</div></td>
                          <td><a href="#" class="btn btn-secondary">Detail</a></td>
                        </tr>
                        <tr>
                          <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-3">
                              <label for="checkbox-3" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td>Backup database</td>
                          <td class="align-middle">
                            <div class="progress" data-height="4" data-toggle="tooltip" title="70%">
                              <div class="progress-bar bg-warning" data-width="70"></div>
                            </div>
                          </td>
                          <td>
                            <img alt="image" src="{{ asset('public/assets/img/avatar/avatar-1.png')}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Rizal Fakhri">
                            <img alt="image" src="{{ asset('public/assets/img/avatar/avatar-2.png')}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Hasan Basri">
                          </td>
                          <td>2018-01-29</td>
                          <td><div class="badge badge-warning">In Progress</div></td>
                          <td><a href="#" class="btn btn-secondary">Detail</a></td>
                        </tr>
                        <tr>
                          <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-4">
                              <label for="checkbox-4" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td>Input data</td>
                          <td class="align-middle">
                            <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                              <div class="progress-bar bg-success" data-width="100"></div>
                            </div>
                          </td>
                          <td>
                            <img alt="image" src="{{ asset('public/assets/img/avatar/avatar-2.png')}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Rizal Fakhri">
                            <img alt="image" src="{{ asset('public/assets/img/avatar/avatar-5.png')}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Isnap Kiswandi">
                            <img alt="image" src="{{ asset('public/assets/img/avatar/avatar-4.png')}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Yudi Nawawi">
                            <img alt="image" src="{{ asset('public/assets/img/avatar/avatar-1.png')}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Khaerul Anwar">
                          </td>
                          <td>2018-01-16</td>
                          <td><div class="badge badge-success">Completed</div></td>
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
        </section>

@endsection