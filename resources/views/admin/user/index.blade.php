@extends('admin.layouts.master')

@section('content')

<section class="section">
<div class="section-header" style="top: 0; position: sticky; z-index: 890">
    <h5>{{$pagename}}</h5>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('user.index')}}">User</a></div>
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
                      <a href="{{route('user.create')}}" class="btn btn-primary pull-right mx-2"> Tambah </a>
                      <!-- <a href="{{url('user')}}" class="btn btn-warning pull-right mx-2"> Import Data User Excel </a> -->

                      <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Import Data Karyawan</button>
                      <form action="{{route('importuser')}}" method="post" enctype="multipart/form-data">

                        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Import Data Karyawan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                  {{ csrf_field() }}
                                  <div class="row">
                                    <div class="col-md-12">
                                      <p>Import Data Karyawan Sesuai dengan format contoh berikut:<br/>
                                      <a href="{{ route('download-template') }}"><i class="fas fa-download"></i>File Contoh Excel Karyawan</a></p>
                                    </div>
                                    <div class="col-md-12">
                                      <label> File Excel Karyawan</label>
                                      <input type="file" name="excel-karyawan" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer bg-whitesmoke br">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        
  
                        
  
                        <!-- tutorial delete -->
                        <!-- <button onclick="handleDelete{}" class="btn btn-warning pull-right mx-2"> Import Data User Excel</button> -->
                        </div>
                      </form>  
                  </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12 col-12">
                    <div class="table-responsive">
                      <table id="datatables" class="table table-striped table-md">
                      <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP/NIPPPK</th>
                            <th>Program Studi</th>
                            <th>Jabatan</th>
                            <th>Role</th>
                            <th>Aksi</th>
                            <!-- <th>Delete</th>
                            <th>Cetak</th>
                            <th>Download</th> -->
                          </tr>
                      </thead>
                      <tbody>
                          <!-- <tr> -->
                            @foreach($allUser as $row)
                            <tr> 
                                <td>{{++$i}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->nip}}</td>
                                <td>{{$row->prodi->nama_prodi ?? ''}}</td>
                                <td>{{$row->jabatan->nama_jabatan ?? ''}}</td>
                                <td>
                                  @if (!empty($row->getRoleNames()))
                                      @foreach ($row->getRoleNames() as $role)
                                          <label class="badge badge-success">{{ $role }}</label>
                                      @endforeach
                                  @endif
                                </td>
                                <td>

                                      <div class="d-flex justify-content-evenly">
                                        <a href="{{route('user.edit',$row->id)}}" class="btn btn-primary"> Edit </a>
                                        <form action="{{route('user.destroy', $row->id)}}" method="post">
                                              @csrf
                                              @method('DELETE')
                                              <button class="btn btn-danger mx-2" type="submit"> Hapus </button>
                                        </form>
                                </td>
                              </tr>
                            @endforeach
                          <!-- </tr> -->
                      </tbody>
                      <table>
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              ...
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      </table>
                    </div>
                  </div>
              </div>
              </div>
            </div>
          </div>
        </section>

@endsection

@section('script')
<!-- <script>
  function mediumModal(id)
  {
    $('#mediumModal').modal('show')
  }
</script> -->
<script>
  var myModal = document.getElementById('myModal')
  var myInput = document.getElementById('myInput')

  myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
  })
</script>
@endsection