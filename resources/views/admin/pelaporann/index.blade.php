@extends('admin.layouts.master')

@section('content')

<section class="section">
<div class="section-header" style="top: 0; position: sticky; z-index: 890">
    <h5>{{$pagename}}</h5>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('pelaporann.index')}}">Pelaporan Perjadin</a></div>
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
                      <a href="{{route('pelaporann.create')}}" class="btn btn-primary pull-right"> Tambah </a>
                    </div>
                  </div>
                  @endrole
                </div>
                <div class="col-12 col-md-12 col-lg-12">
                  <div class="table-responsive">
                    <table id="datatables" class="table table-striped table-md ">
                      <thead>
                          <tr>
                            <th>No</th>
                            <th>Judul Laporan</th>
                            <th>Dasar Pelaksanaan Dinas</th>
                            <th>Instansi</th>
                            <th>Waktu Pelaksanaan</th>
                            <th>Tanggal Surat</th>
                            <th>Status Surat</th>
                            @role('keuangan')
                            <th>Dokumen</th>
                            @endrole
                            <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($data as $row)
                          <tr>
                              <td>{{++$i}}</td>
                              <td>{{$row->judul_laporan}}</td>
                              <td>{{$row->dasar_pelaksanaan}}</td>
                              <td>{{$row->instansi}}</td>
                              <td>{{$row->waktu_mulai}} <br> {{$row->waktu_selesai}}</td>
                              <td>{{$row->tanggal_surat}}</td>
                              <td>{{$row->status ? $row->status : '-'}}</td>

                              @role('karyawan')
                              <td>
                                  <div class="d-flex justify-content-evenly">
                                    <a href="{{route('pelaporann.edit',$row->id)}}" class="btn btn-primary"> Edit </a>
                                    <a href="{{route('pelaporann.show',$row->id)}}" target="blank" class="btn btn-info mx-2"> Cetak </a>

                                    <!-- <form action="{{route('pelaporann.destroy', $row->id)}}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <button class="btn btn-danger" type="submit"> Hapus </button>
                                    </form> -->
                                    <button class="btn btn-danger hapuslaporan" type="" data-toggle="modal" data-target="#deletelaporan" value="{{$row->id}}"> Hapus </button>
                                    <form action="{{route('pelaporann.destroy', $row->id)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <div class="modal fade" tabindex="-1" role="dialog" id="deletelaporan" data-backdrop="false">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header text-danger">
                                              <h5>Hapus Laporan Perjalana Dinas</h5>
                                            </div>
                                            <div class="modal-body">
                                              <div class="row">
                                                <input type="hidden" id="laporan_id" name="laporan_id">
                                                <h6>Apakah Anda Yakin Ingin Menghapusnya?</h6>
                                              </div>
                                            </div>
                                            <div class="modal-footer bg-whitesmoke br">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                              <button type="submit" class="btn btn-danger">Hapus</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                              </td>
                              @endrole

                              @role('keuangan')
                              <td>
                                  <div class="d-flex justify-content-evenly align-items-center">
                                    <a href="{{route('pelaporann.show',$row->id)}}" target="blank" class="btn btn-primary mx-2"> Cetak </a>

                                    @empty($row->dokumen_pendukung)
                                    <a href="#" class="btn btn-secondary disabled mx-2"> Unduh </a>
                                    @else
                                    <a href="{{route('dokumenpendukungdownload', $row->id) }}" class="btn btn-info mx-2"> Unduh </a>
                                    @endempty
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex justify-content-evenly align-items-center">
                                    <!-- <a href="{{route('pelaporann.show',$row->id)}}" class="btn btn-info mx-2"> View </a> -->
                                    <!-- <a href="#" class="btn btn-success mx-2"> Menyetujui </a> -->
                                    <form action="{{route('accpelaporann', $row->id)}}" method="post">
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

                            </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- MODAL HAPUS SURAT -->
        <script>
          $(document).on('click', '.hapuslaporan', function() {
            var laporan_id = $(this).val();
            // alert(surattugas_id);
            $('#laporan_id').val(laporan_id);
          });
        </script>

@endsection