@extends('admin.layouts.master')

@section('content')

<div class="section-body">
<div class="section-header" style="top: 0; position: sticky; z-index: 890">
    <h5>{{$pagename}}</h5>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('pelaporann.index')}}">Pelaporan Perjadin</a></div>
      <div class="breadcrumb-item">{{ $pagename }}</div>
    </div>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-body card-block">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>{{$pagename}}</h4>
                  </div>
                  <div class="card-body card-block">
                  @if($errors->any())
                    <div class="alert alert-danger">
                        <div class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item" style="color:red">
                                    {{ $error }}
                                </li>   
                            @endforeach
                        </div>
                    </div>
                  @elseif(session()->get('gagal'))
                    <div class="alert alert-succes" style="color:red">
                      {{session()->get('gagal')}}
                    </div>
                  @endif
                  <form action="{{route('pelaporann.store')}}" method="post" enctype="multipart/form-data" class="form=horizontal">
                   @csrf
                  <div class="container">
                      <div class="row align-items-start">
                        <div class="col">
                      </div>
                    </div>
                        </div>
                        <div class="col">
                          <div class="row form-group">
                                  <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Judul Laporan</label></div>
                                  <div class="col-12 col-md-9"><textarea name="judul_laporan" id="textarea-input" rows="9" style="height: 100px" class="form-control"></textarea></div>
                          </div>
                          <div class="row form-group">
                                  <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Dasar Pelaksanaan</label></div>
                                  <div class="col-6 col-md-6"><textarea name="dasar_pelaksanaan" id="textarea-input" rows="9" style="height: 100px" class="form-control"></textarea></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Maksud Perjalanan Dinas</label></div>
                              <div class="col-6 col-md-6"><input type="text" id="text-input" name="maksud_perjalanandinas" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Dinas / Instansi yang Dikunjungi</label></div>
                              <div class="col-6 col-md-6"><input type="text" id="text-input" name="instansi" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Waktu Pelaksanaan</label></div>
                              <div class="col-3 col-md-3"><input type="date" id="text-input" name="waktu_mulai" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Sampai</label></div>
                              <div class="col-3 col-md-3"><input type="date" id="text-input" name="waktu_selesai" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Hasil</label></div>
                              <div class="col-12 col-md-9"><textarea name="hasil" id="textarea-input" rows="9" style="height: 150px" class="form-control"></textarea></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Penutup</label></div>
                              <div class="col-12 col-md-9">
                                <textarea name="penutup" id="textarea-input" rows="9" style="height: 150px" class="form-control">
                                Demikian Laporan perjalanan dinas ini dibuat, sebagai bahan Laporan
                                </textarea>
                              </div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="file-input" class=" form-control-label">Foto Kegiatan 1</label></div>
                              <div class="col-12 col-md-9"><input type="file" id="file-input" name="foto_kegiatan" class="form-control-file"></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="file-input" class=" form-control-label">Foto Kegiatan 2</label></div>
                              <div class="col-12 col-md-9"><input type="file" id="file-input" name="foto_kegiatan2" class="form-control-file"></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="file-input" class=" form-control-label">Foto Kegiatan 3</label></div>
                              <div class="col-12 col-md-9"><input type="file" id="file-input" name="foto_kegiatan3" class="form-control-file"></div>
                          </div>
                          <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Surat</label></div>
                                <div class="col-3 col-md-3"><input type="date" id="text-input" name="date_tanggalsurat" placeholder="Text" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Penanda Tangan</label></div>
                              <div class="col-6 col-md-6">
                              <select name='optionid_user' class="form-control">
                              <option value="" label="pilih penanda tangan"></option>
                                  @foreach($data_User as $User)
                                    @if(!in_array($User->username, ['sekdir', 'kepegawaian', 'keuangan', 'superadmin', 'kajur']))
                                      <option value="{{$User->id}}">
                                          {{$User->name}}
                                      </option>    
                                    @endif
                                  @endforeach
                              </select>
                              </small></div>
                          </div>
                        </div>
                      </div>

                    </div>
                  <div class="footer text-right">
                      <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                      <a class="btn btn-danger text-white" href="{{route('pelaporann.index')}}" type="reset">Kembali</a>
                  </div>
                 </form>
                </div>
</div>

@endsection