@extends('admin.layouts.master')

@section('content')

<div class="section-body">
<div class="section-header">
    <h5>{{$pagename}}</h5>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('undangan.index')}}">Surat Undangan</a></div>
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
                  <form action="{{route('undangan.update', $data->id)}}" method="post" enctype="multipart/form-data" class="form=horizontal">
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
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tertuju</label></div>
                            <div class="col-6 col-md-6"><input type="text" id="text-input" name="txt_tertuju" value="{{$data->tertuju}}" placeholder="Text" class="form-control"><small class="form-text text-muted"></small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Instansi</label></div>
                            <div class="col-6 col-md-6"><input type="text" id="text-input" name="txt_instansi" value="{{$data->instansi}}" placeholder="Text" class="form-control"><small class="form-text text-muted"></small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Agenda</label></div>
                            <div class="col-6 col-md-6"><input type="text" id="text-input" name="txt_agenda" value="{{$data->agenda}}" placeholder="Text" class="form-control"><small class="form-text text-muted"></small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Hari/Tanggal</label></div>
                            <div class="col-3 col-md-3"><input type="date" id="text-input" name="date_haritanggal" value="{{$data->hari_tanggal}}" placeholder="Text" class="form-control"><small class="form-text text-muted"></small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Pukul</label></div>
                            <div class="col-3 col-md-3"><input type="time" id="text-input" name="time_pukul" value="{{$data->pukul}}" placeholder="Text" class="form-control"><small class="form-text text-muted"></small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tempat</label></div>
                            <div class="col-6 col-md-6"><input type="text" id="text-input" name="txt_tempat" value="{{$data->tempat}}" placeholder="Text" class="form-control"><small class="form-text text-muted"></small></div>
                        </div>
                          <!-- <div class="form-group">
                            <label>Tertuju</label>
                            <input type="text" name='txt_tertuju' value="{{$data->tertuju}}" class="form-control" placeholder="Tertuju">
                          </div>
                          <div class="form-group">
                            <label>Instansi</label>
                            <input type="text" name='txt_instansi' value="{{$data->instansi}}" class="form-control" placeholder="Instansi">
                          </div>
                          <div class="form-group">
                            <label>Agenda</label>
                            <input type="text" name='txt_agenda' value="{{$data->agenda}}" class="form-control" placeholder="Agenda">
                          </div>
                          <div class="form-group">
                            <label>Hari/Tanggal</label>
                            <input type="date" name='date_haritanggal' value="{{$data->hari_tanggal}}" class="form-control" placeholder="dd/mm/yyy">
                          </div>
                          <div class="form-group">
                            <label>Pukul</label>
                            <input type="time" name='time_pukul' value="{{$data->pukul}}" class="form-control" placeholder="WIB">
                          </div>
                          <div class="form-group">
                            <label>Tempat</label>
                            <input type="text" name='txt_tempat' value="{{$data->tempat}}" class="form-control" placeholder="Tempat">
                          </div> -->

                          <!-- KHUSUS SEKDIR -->
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Surat</label></div>
                              <div class="col-3 col-md-3"><input type="date" id="text-input" name="date_tanggalsurat" value="{{$data->tanggal_surat}}" placeholder="Text" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor</label></div>
                              <div class="col-3 col-md-3"><input type="int" id="text-input" name="int_nomor" disabled value="{{$data->nomor}}" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jenis Surat</label></div>
                              <div class="col-3 col-md-3"><input type="string" id="text-input" name="string_jenissurat" placeholder="Text" value="{{$data->jenis_surat}}" class="form-control"><small class="form-text text-muted"></small></div>                       
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kode Surat</label></div>
                              <div class="col-3 col-md-3"><input type="int" id="text-input" name="int_kode" value="{{$data->kode_surat}}" placeholder="Text" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tahun Surat</label></div>
                              <div class="col-3 col-md-3"><input type="year" id="text-input" name="year_tahunsurat" placeholder="Text" value="{{$data->tahun_surat}}" class="form-control"><small class="form-text text-muted"></small></div>                       
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
                            <label>Nomor</label>
                            <input type="int" name='int_nomor' disabled value="{{$data->nomor}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Kode</label>
                            <input type="int" name='int_kode' value="{{$data->kode_surat}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Jenis Surat</label>
                            <input type="string" name='string_jenissurat' value="{{$data->jenis_surat}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Tahun Surat</label>
                            <input type="year" name='year_tahunsurat' value="{{$data->tahun_surat}}" class="form-control">
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
                  </div> -->
                  <div class="footer text-right">
                      <button class="btn btn-primary mr-1" type="submit">Update</button>
                      <a class="btn btn-danger text-white" href="{{route('undangan.index')}}" type="reset">Kembali</a>
                  </div>
                 </form>
                </div>
</div>

@endsection