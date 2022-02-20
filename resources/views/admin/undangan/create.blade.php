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
                    {{ $cek }}
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
                  <form action="{{route('undangan.store')}}" method="post" enctype="multipart/form-data" class="form=horizontal">
                   @csrf
                  <div class="container">
                      <div class="row align-items-start">
                        <div class="col">
                      </div>
                    </div>
                        <div class="col">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tertuju</label></div>
                            <div class="col-6 col-md-6"><input type="text" id="text-input" name="txt_tertuju" placeholder="Nama Tujuan" class="form-control"><small class="form-text text-muted"></small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Instansi</label></div>
                            <div class="col-6 col-md-6"><input type="text" id="text-input" name="txt_instansi" placeholder="Nama Instansi" class="form-control"><small class="form-text text-muted"></small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Agenda</label></div>
                            <div class="col-6 col-md-6"><input type="text" id="text-input" name="txt_agenda" placeholder="Agenda" class="form-control"><small class="form-text text-muted"></small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Hari/Tanggal</label></div>
                            <div class="col-3 col-md-3"><input type="date" id="text-input" name="date_haritanggal" placeholder="Text" class="form-control"><small class="form-text text-muted"></small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Pukul</label></div>
                            <div class="col-3 col-md-3"><input type="time" id="text-input" name="time_pukul" placeholder="Text" class="form-control"><small class="form-text text-muted"></small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tempat</label></div>
                            <div class="col-6 col-md-6"><input type="text" id="text-input" name="txt_tempat" placeholder="Nama Lokasi" class="form-control"><small class="form-text text-muted"></small></div>
                        </div>
                          <!-- <div class="form-group">
                            <label>Tertuju</label>
                            <input type="text" name='txt_tertuju' class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Instansi</label>
                            <input type="text" name='txt_instansi' class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Agenda</label>
                            <input type="text" name='txt_agenda' class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Hari/Tanggal</label>
                            <input type="date" name='date_haritanggal' class="form-control" placeholder="dd/mm/yyy">
                          </div>
                          <div class="form-group">
                            <label>Pukul</label>
                            <input type="time" name='time_pukul' class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Tempat</label>
                            <input type="text" name='txt_tempat' class="form-control">
                          </div> -->

                          <!-- KHUSUS SEKDIR -->
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Surat</label></div>
                              <div class="col-3 col-md-3"><input type="date" id="text-input" name="date_tanggalsurat" placeholder="Text" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor</label></div>
                              <div class="col-3 col-md-3"><input type="int" id="text-input" name="int_nomor" disabled value="{{$nomormax}}" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jenis Surat</label></div>
                              <div class="col-3 col-md-3"><input type="string" id="text-input" name="string_jenissurat" class="form-control"><small class="form-text text-muted"></small></div>
                  
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kode Surat</label></div>
                              <div class="col-3 col-md-3"><input type="int" id="text-input" name="int_kode" class="form-control"><small class="form-text text-muted"></small></div>
                  
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tahun Surat</label></div>
                              <div class="col-3 col-md-3"><input type="year" id="text-input" name="year_tahunsurat" placeholder="YYYY" class="form-control"><small class="form-text text-muted"></small></div>
                  
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama / NIP Penanda Tangan</label></div>
                              <div class="col-6 col-md-6">
                              <select name='optionid_user' class="form-control">
                                  @foreach($data_User as $User)
                                      <option value={{$User->name}}>
                                          {{$User->name}} / {{$User->nip}}</option>    
                                  @endforeach
                              </select>
                              </div>
                          </div>
                          <!-- <div class="form-group">
                            <label>Tanggal Surat</label>
                            <input type="date" name='date_tanggalsurat' class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Nomor</label>
                            <input type="int" name='int_nomor' disabled value="{{$nomormax}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Kode</label>
                            <input type="int" name='int_kode' class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Jenis Surat</label>
                            <input type="string" name='string_jenissurat' class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Tahun Surat</label>
                            <input type="year" name='year_tahunsurat' class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Nama Penanda Tangan</label>
                            <select name='optionid_user' class="form-control">
                                @foreach($data_User as $User)
                                    <option value={{$User->id}}>
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
                      <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                      <a class="btn btn-danger text-white" href="{{route('undangan.index')}}" type="reset">Kembali</a>
                  </div>
                  </div>
                 </form>
                </div>
</div>

@endsection