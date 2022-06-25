@extends('admin.layouts.master')

@section('content')


<section class="section">
            <div class="section-header" style="top: 0; position: sticky; z-index: 890">
                  <h5>{{$pagename}}</h5>
                  <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{route('kelompokk.index')}}">Surat Tugas</a></div>
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
                    @role('karyawan')
                    <div class="card-header-action">
                          <div class="input-group">
                            <a href="{{route('perorangann.create')}}" class="btn btn-primary pull-right mx-2"> Perorangan </a>
                            <a href="{{route('kelompokk.create')}}" class="btn btn-warning pull-right mx-2"> Kelompok </a>
                          </div>
                    </div>
                    @endrole
                  </div>

                  <div class="col-12 col-md-12 col-lg-12">
                      <div class="table-responsive">
                        <table id="datatables" class="table table-striped table-md table-responsive">
                          <thead>
                              <tr>
                                <th>No</th>
                                <th>Nomor Permohonan Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Hal</th>
                                <th>Kegiatan</th>
                                <th>Waktu Pelaksanaan</th>
                                <th>Tempat</th>
                                <th>Tipe Surat</th>
                                
                                @role('karyawan')
                                <th>Download Dokumen</th>
                                <th>Aksi</th>
                                @endrole

                                @role('kajur')
                                <th>Aksi</th>
                                @endrole

                                @role('sekdir')
                                <th>Nomor Agenda</th>
                                <th>Permohonan</th>
                                <th>Surat Disposisi</th>
                                <th>Surat Tugas</th>
                                @endrole

                                @role('kepegawaian')
                                <th>Nomor Agenda</th>
                                <th>Nomor Surat</th>
                                <th>Unduh Dokumen</th>
                                <th>Surat Tugas</th>
                                @endrole
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($data as $row)
                                <tr>
                                  <td>{{++$i}}</td>
                                  <td>{{$row->nomor_permohonan}}</td>
                                  <td>{{$row->tanggal_permohonan}}</td>
                                  <td>{{$row->hal}}</td>
                                  <td>{{$row->jenis_kegiatan}}</td>
                                  <td>{{$row->waktu_pelaksanaan}}</td>
                                  <td>{{$row->tempat}}</td>
                                  <td>{{$row->tipe_surat}}</td>

                                  @role('karyawan')
                                  <td>
                                      <div class="d-flex justify-content-evenly">
                                        <a href="#" class="btn btn-success mx-2"> Disposisi </a>
                                        <a href="#" class="btn btn-info"> Tugas </a>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="d-flex justify-content-evenly">
                                        @if($row->tipe_surat == 'perorangan')
                                        <a href="{{route('kelompokk.edit',$row->id)}}" class="btn btn-primary"> Edit </a>
                                        @elseif($row->tipe_surat == 'kelompok')
                                        <a href="{{route('kelompokk.edit',$row->id)}}" class="btn btn-primary"> Edit </a>
                                        @endif
                                        
                                        @if($row->tipe_surat == 'perorangan')
                                          <a href="{{route('perorangann.show',$row->id)}}" class="btn btn-info mx-2"> Cetak </a>
                                        @elseif($row->tipe_surat == 'kelompok')
                                          <a href="{{route('kelompokk.show',$row->id)}}" class="btn btn-info mx-2"> Cetak </a>
                                        @endif
                                        <!-- <a href="#" class="btn btn-success"> Download </a> -->
                                        <form action="{{route('kelompokk.destroy', $row->id)}}" method="post">
                                              @csrf
                                              @method('DELETE')
                                              <button class="btn btn-danger" type="submit"> Hapus </button>
                                        </form>
                                      </div>
                                    </td>
                                    @endrole

                                    @role('kajur')
                                    <td>
                                      <div class="d-flex justify-content-evenly align-items-center">
                                        @if($row->tipe_surat == 'perorangan')
                                          <a href="{{route('perorangann.show',$row->id)}}" class="btn btn-info mx-2"> View </a>
                                        @elseif($row->tipe_surat == 'kelompok')
                                          <a href="{{route('kelompokk.show',$row->id)}}" class="btn btn-info mx-2"> View </a>
                                        @endif
                                        <!-- <a href="{{route('kelompokk.show',$row->id)}}" class="btn btn-info mx-2"> View </a> -->
                                        <form action="{{route('acckelompokk', $row->id)}}" method="post">
                                                @csrf
                                                @if($row->status=='disetujui')
                                                  <button class="btn btn-secondary" disabled type="submit"> Disetujui </button>
                                                  @else
                                                  <button class="btn btn-success" type="submit"> Menyetujui </button>
                                                @endif
                                        </form>
                                      </div>
                                    </td>            
                                    @endrole

                                    @role('sekdir')
                                    <td>{{$row->disposisi ? $row->disposisi->nomor_agenda : '-'}}</td>
                                    <td>
                                        @if($row->tipe_surat == 'perorangan')
                                          <a href="{{route('perorangann.show',$row->id)}}" class="btn btn-primary mx-2"> Cetak </a>
                                        @elseif($row->tipe_surat == 'kelompok')
                                          <a href="{{route('kelompokk.show',$row->id)}}" class="btn btn-primary mx-2"> Cetak </a>
                                        @endif
                                    <!-- <a href="{{route('kelompokk.show',$row->id)}}" class="btn btn-primary mx-2"> Cetak </a> -->
                                      <!-- <div class="d-flex justify-content-evenly">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalkelompokk">Cetak</button>
                                        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModalkelompokk" data-backdrop="false">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title">View Surat Permohonan Karyawan</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                <label> Tampilan bentuk surat permohonan</label>
                                              </div>
                                              <div class="modal-footer bg-whitesmoke br">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                  <button type="button" class="btn btn-primary">Kirim</button>
                                              </div>
                                              </div>
                                          </div>
                                        </div>
                                      </div> -->
                                    </td>
                                    <td>
                                      <div class="d-flex justify-content-evenly">
                                        <!-- <a href="{{route('kelompokk.edit',$row->id)}}" class="btn btn-warning mx-2"> Buat </a> -->
                                        <a href="{{route('disposisi.create', ['id' => $row->id])}}" class="btn btn-warning mx-2"> Buat </a>
                                        <a href="{{route('disposisi.show',$row->id)}}" class="btn btn-primary mx-2"> Cetak </a>
                                        <!-- <a href="#" class="btn btn-info"> Kirim </a> -->
                                        <button class="btn btn-info" data-toggle="modal" data-target="#suratdisposisiModalkelompokk">Kirim</button>
                                        <!-- <form action="route('kelompokk.suratdisposisi')" method="post" enctype='multipart/form-data'> -->
                                        <form action="" method="post" enctype='multipart/form-data'>
                                          @csrf
                                          <div class="modal fade" tabindex="-1" role="dialog" id="suratdisposisiModalkelompokk" data-backdrop="false">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Unggah Surat Disposisi</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor Surat Tugas</label></div>
                                                    <div class="col-6 col-md-6"><input type="text" id="text-input" name="nomor_surattugas" placeholder="Nomor Surat Tugas" class="form-control"><small class="form-text text-muted"></small></div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">File Surat Disposisi</label></div>
                                                    <div class="col-12 col-md-9">
                                                      <input type="file" id="file" name="file_disposisi" class="form-control-file" value="{{ old('file_dosposisi') }}"></div>
    
                                                      @error('file_disposisi')
                                                      <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                      </span>
                                                      @enderror
                                                </div>
                                                </div>
                                                <div class="modal-footer bg-whitesmoke br">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                                </div>
                                                </div>
                                            </div>
                                          </div>
                                        </form>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="d-flex justify-content-evenly">
                                        <a href="#" class="btn btn-success mx-2"> Download </a>
                                        <button class="btn btn-info surattugasbtn" data-toggle="modal" data-target="#surattugasModalkelompokk">Kirim</button>
                                        <!-- <a href="#" class="btn btn-info"> Kirim </a> -->
                                        <!-- <form action="route('kelompokk.uploadsurattugas')" method="post" enctype='multipart/form-data'> -->
                                        <form action="" method="post" enctype='multipart/form-data'>
                                          @csrf 
                                          @method('put')
                                        <div class="modal fade" tabindex="-1" role="dialog" id="surattugasModalkelompokk" data-backdrop="false">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title">Unggah Surat Tugas</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                              <div class="row form-group">
                                                  <div class="col col-md-3"><label for="file-input" class=" form-control-label">File Surat Tugas</label></div>
                                                  <div class="col-12 col-md-9"><input type="file" id="file-input" name="file_surattugas" class="form-control-file"></div>
                                              </div>
                                              </div>
                                              <div class="modal-footer bg-whitesmoke br">
                                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                                                  <button type="submit" class="btn btn-primary">Kirim</button>
                                              </div>
                                              </div>
                                          </div>
                                        </div>
                                        </form>
                                      </div>
                                    </td>
                                    @endrole

                                    @role('kepegawaian')
                                    <td>{{$row->disposisi ? $row->disposisi->nomor_agenda : '-'}}</td>
                                    <td>{{$row->nomor_surat}}</td>
                                    <td>
                                      <div class="d-flex justify-content-evenly">
                                        @if($row->tipe_surat == 'perorangan')
                                          <a href="{{route('perorangann.show',$row->id)}}" class="btn btn-success mx-2"> Pengajuan </a>
                                        @elseif($row->tipe_surat == 'kelompok')
                                          <a href="{{route('kelompokk.show',$row->id)}}" class="btn btn-success mx-2"> Pengajuan </a>
                                        @endif
                                        <!-- <a href="{{route('kelompokk.show',$row->id)}}" class="btn btn-success mx-2"> Pengajuan </a> -->
                                        <a href="#" class="btn btn-primary"> Disposisi </a>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="d-flex justify-content-evenly">
                                      <a href="{{route('surattugas.create',$row->id)}}" class="btn btn-warning mx-2"> Buat </a>
                                      <a href="{{route('surattugas.show',$row->id)}}" class="btn btn-light mx-2"> View </a>
                                        <!-- <a href="{{route('kelompokk.edit',$row->id)}}" class="btn btn-warning mx-2"> Buat </a> -->
                                        <a href="#" class="btn btn-info"> Unduh </a>
                                      </div>
                                    </td>
                                    @endrole
                                  </td>
                                </tr>
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- </div> -->
        </section>
<!-- <script>
  $(document).ready(function() {
          
  $(document).on('click','.surattugasbtn', function(){
      var surattugas_id = $(this).val();
      // alert(surattugas_id);
      $(#surattugasModalkelompokk).modal('modal-open');
    })

  });
</script> -->
@endsection