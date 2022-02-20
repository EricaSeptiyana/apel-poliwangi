@extends('admin.layouts.master')

@section('content')

<div class="section-body">
<div class="section-header">
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
                  @endif
                  <form action="{{route('pelaporann.update', $data->id)}}" method="post" enctype="multipart/form-data" class="form=horizontal">
                    @method('PATCH')
                    @csrf
                  <div class="container">
                      <div class="row align-items-start">
                        <div class="col">
                          <!-- <div class="form-group">
                            <label>Foto</label>
                            <input type="file" class="form-control">
                          </div>
                          <div class="form-group">
                            <label class="d-block">Jenis Kelamin</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" checked>
                              <label class="form-check-label" for="exampleRadios1">
                                Perempuan
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" checked>
                              <label class="form-check-label" for="exampleRadios2">
                                Laki-Laki
                              </label> -->
                      </div>
                    </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                          <div class="row form-group">
                                  <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Judul Laporan</label></div>
                                  <div class="col-12 col-md-9"><textarea name="judul_laporan" id="textarea-input" rows="9" style="height: 100px" class="form-control">{{$data->judul_laporan}}</textarea></div>
                          </div>
                          <div class="row form-group">
                                  <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Dasar Pelaksanaan</label></div>
                                  <div class="col-12 col-md-9"><textarea name="dasar_pelaksanaan" id="textarea-input" rows="9" style="height: 100px" class="form-control">{{$data->dasar_pelaksanaan}}</textarea></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Maksud Perjalanan Dinas</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="text-input" name="maksud_perjalanandinas" value="{{$data->maksud_perjalanandinas}}" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Dinas / Instansi yang Dikunjungi</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="text-input" name="instansi" value="{{$data->instansi}}" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Waktu Mulai</label></div>
                              <div class="col-3 col-md-3"><input type="date" id="text-input" name="waktu_mulai" value="{{$data->waktu_mulai}}" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Waktu Selesai</label></div>
                              <div class="col-3 col-md-3"><input type="date" id="text-input" name="waktu_selesai" value="{{$data->waktu_selesai}}" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                                  <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Hasil</label></div>
                                  <div class="col-12 col-md-9"><textarea name="hasil" id="textarea-input" rows="9" style="height: 150px" class="form-control">{{$data->hasil}}</textarea></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="file-input" class=" form-control-label">Foto Kegiatan</label></div>
                              <div class="col-12 col-md-9"><input type="file" id="file-input" name="foto_kegiatan"  value="{{$data->foto_kegiatan}}" class="form-control-file"></div>
                          </div>
                            <!-- <label>Judul Laporan</label>
                            <textarea type="textarea" name='judul_laporan' class="form-control">{{$data->judul_laporan}}</textarea>
                          </div>
                          <div class="form-group">
                            <label>Dasar Pelaksanaan</label>
                            <textarea type="textarea" name='dasar_pelaksanaan' class="form-control" style="height: 100px">{{$data->dasar_pelaksanaan}}</textarea>
                           </div>
                          <div class="form-group">
                            <label>Maksud Perjalanan Dinas</label>
                            <input type="text" name='maksud_perjalanandinas' value="{{$data->maksud_perjalanandinas}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Dinas / Instansi yang Dikunjungi</label>
                            <input type="text" name='instansi' value="{{$data->instansi}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Waktu Mulai</label>
                            <input type="date" name='waktu_mulai' value="{{$data->waktu_mulai}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Waktu Selesai</label>
                            <input type="date" name='waktu_selesai' value="{{$data->waktu_selesai}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Hasil</label>
                            <textarea type="textarea" name='hasil' class="form-control">{{$data->hasil}}</textarea>
                         </div>
                          <div class="form-group">
                            <label>Foto Kegiatan</label>
                            <input type="file" name='foto_kegiatan' value="{{$data->foto_kegiatan}}" class="form-control">
                          </div> -->
                          

                          <!-- KHUSUS SEKDIR -->
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Surat</label></div>
                              <div class="col-3 col-md-3"><input type="date" id="text-input" name="date_tanggalsurat" value="{{$data->tanggal_surat}}" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama / NIP Penanda Tangan</label></div>
                            <div class="col-6 col-md-6">
                            <select name='optionid_user' class="form-control">
                            @foreach($data_User as $User)
                                <option value={{$User->name}}
                                    @if($User->name==$data->penanda_tangan)
                                        selected
                                    @endif
                                >
                                    {{$User->name}} / {{$User->nip}}</option>    
                            @endforeach
                            </select>
                            </small></div>
                        </div>
                          <!-- <div class="form-group">
                            <label>Tanggal Surat</label>
                            <input type="date" name='date_tanggalsurat' value="{{$data->tanggal_surat}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Nama / NIP Penanda Tangan</label>
                            <select name='optionid_user' class="form-control">
                                @foreach($data_User as $User)
                                    <option value={{$User->id}}
                                        @if($User->id==$data->penanda_tangan)
                                            selected
                                        @endif
                                    >
                                        {{$User->name}} / {{$User->nip}}</option>    
                                @endforeach
                            </select>
                          </div> -->
                        </div>                     
                      </div>

                    </div>
                  
                  <!-- <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>-->
                  <div class="footer text-right">
                      <button class="btn btn-primary mr-1" type="submit">Update</button>
                      <a class="btn btn-danger text-white" href="{{route('pelaporann.index')}}" type="reset">Kembali</a>
                  </div>
                 </form>
                </div>
</div>

@endsection