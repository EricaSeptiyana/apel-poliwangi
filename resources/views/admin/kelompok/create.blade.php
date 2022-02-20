@extends('admin.layouts.master')

@section('content')

<div class="section-body">
<div class="section-header">
    <h5>{{$pagename}}</h5>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('kelompok.index')}}">Surat Tugas</a></div>
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
                  <form action="{{route('kelompok.store')}}" method="post" enctype="multipart/form-data" class="form=horizontal">
                   @csrf
                  <div class="container">
                      <div class="row align-items-start">
                        <div class="col">
                      </div>
                    </div>
                        </div>
                        <div class="col">
                        <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Pembuka</label></div>
                                <div class="col-12 col-md-9"><textarea name="txt_pembuka" id="textarea-input" rows="9" style="height: 100px" class="form-control">Yang bertanda tangan dibawah ini, Direktur Politeknik Negeri Banyuwangi menugaskan Pegawai sebagai berikut:</textarea></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jenis Kegiatan</label></div>
                            <div class="col-6 col-md-6"><input type="text" id="text-input" name="jenis_kegiatan" placeholder="Nama Kegiatan" class="form-control"><small class="form-text text-muted"></small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jabatan</label></div>
                            <div class="col-4 col-md-4"><input type="text" id="text-input" name="txt_jabatan" class="form-control"><small class="form-text text-muted"></small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Waktu Mulai</label></div>
                            <div class="col-3 col-md-3"><input type="date" id="text-input" name="waktu_mulai"  class="form-control"><small class="form-text text-muted"></small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Waktu Selesai</label></div>
                            <div class="col-3 col-md-3"><input type="date" id="text-input" name="waktu_mulai" class="form-control"><small class="form-text text-muted"></small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tempat</label></div>
                            <div class="col-6 col-md-6"><input type="text" id="text-input" name="txt_tempat" placeholder="Nama Lokasi" class="form-control"><small class="form-text text-muted"></small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">File kelompok (Jika Ada)</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="file-input" name="file_kelompok" class="form-control-file"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">File Disposisi (Jika Ada)</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="file-input" name="file_disposisi" class="form-control-file"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Anggota 1</label></div>
                            <div class="col-6 col-md-6">
                            <select name='optionid_user' class="form-control">
                                @foreach($data_User as $User)
                                    <option value={{$User->name}}>
                                        {{$User->name}} / {{$User->nip}}</option>    
                                @endforeach
                            </select>
                            </small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Anggota 2</label></div>
                            <div class="col-6 col-md-6">
                            <select name='optionid_user' class="form-control">
                                @foreach($data_User as $User)
                                    <option value={{$User->name}}>
                                        {{$User->name}} / {{$User->nip}}</option>    
                                @endforeach
                            </select>
                            </small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Anggota 3</label></div>
                            <div class="col-6 col-md-6">
                            <select name='optionid_user' class="form-control">
                                @foreach($data_User as $User)
                                    <option value={{$User->name}}>
                                        {{$User->name}} / {{$User->nip}}</option>    
                                @endforeach
                            </select>
                            </small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Anggota 4</label></div>
                            <div class="col-6 col-md-6">
                            <select name='optionid_user' class="form-control">
                                @foreach($data_User as $User)
                                    <option value={{$User->name}}>
                                        {{$User->name}} / {{$User->nip}}</option>    
                                @endforeach
                            </select>
                            </small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Anggota 5</label></div>
                            <div class="col-6 col-md-6">
                            <select name='optionid_user' class="form-control">
                                @foreach($data_User as $User)
                                    <option value={{$User->name}}>
                                        {{$User->name}} / {{$User->nip}}</option>    
                                @endforeach
                            </select>
                            </small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Anggota 6</label></div>
                            <div class="col-6 col-md-6">
                            <select name='optionid_user' class="form-control">
                                @foreach($data_User as $User)
                                    <option value={{$User->name}}>
                                        {{$User->name}} / {{$User->nip}}</option>    
                                @endforeach
                            </select>
                            </small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Anggota 7</label></div>
                            <div class="col-6 col-md-6">
                            <select name='optionid_user' class="form-control">
                                @foreach($data_User as $User)
                                    <option value={{$User->name}}>
                                        {{$User->name}} / {{$User->nip}}</option>    
                                @endforeach
                            </select>
                            </small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Anggota 8</label></div>
                            <div class="col-6 col-md-6">
                            <select name='optionid_user' class="form-control">
                                @foreach($data_User as $User)
                                    <option value={{$User->name}}>
                                        {{$User->name}} / {{$User->nip}}</option>    
                                @endforeach
                            </select>
                            </small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Anggota 9</label></div>
                            <div class="col-6 col-md-6">
                            <select name='optionid_user' class="form-control">
                                @foreach($data_User as $User)
                                    <option value={{$User->name}}>
                                        {{$User->name}} / {{$User->nip}}</option>    
                                @endforeach
                            </select>
                            </small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Anggota 10</label></div>
                            <div class="col-6 col-md-6">
                            <select name='optionid_user' class="form-control">
                                @foreach($data_User as $User)
                                    <option value={{$User->name}}>
                                        {{$User->name}} / {{$User->nip}}</option>    
                                @endforeach
                            </select>
                            </small></div>
                        </div>
                          <!-- <div class="form-group">
                            <label>Pembuka</label>
                            <textarea type="textarea" name='txt_pembuka' value="Yang bertanda tangan dibawah ini, Direktur Politeknik Negeri Banyuwangi menugaskan Pegawai sebagai berikut:" class="form-control">Yang bertanda tangan dibawah ini, Direktur Politeknik Negeri Banyuwangi menugaskan Pegawai sebagai berikut:</textarea>
                          </div>
                          <div class="form-group">
                            <label>Jenis Kegiatan</label>
                            <input type="text" name='jenis_kegiatan' class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name='txt_jabatan' class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Waktu Mulai</label>
                            <input type="date" name='waktu_mulai' class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Waktu Selesai</label>
                            <input type="date" name='waktu_selesai' class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Tempat</label>
                            <input type="text" name='txt_tempat' class="form-control">
                          </div>
                          <div class="form-group">
                            <label>File Undangan (Jika Ada)</label>
                            <input type="file" name='file_undangan' class="form-control">
                          </div>
                          <div class="form-group">
                            <label>File Disposisi (Jika Ada)</label>
                            <input type="file" name="file_disposisi" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Anggota 1</label>
                            <select name='nama' class="form-control">
                                @foreach($data_User as $User)
                                    <option value={{$User->name}}>
                                        {{$User->name}} / {{$User->nip}}</option>    
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Anggota 2</label>
                            <select name='nama1' class="form-control">
                                @foreach($data_User as $User)
                                    <option value={{$User->name}}>
                                        {{$User->name}} / {{$User->nip}}</option>    
                                @endforeach
                            </select>
                          </div> -->

                          <!-- KHUSUS SEKDIR -->
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Surat</label></div>
                              <div class="col-3 col-md-3"><input type="date" id="text-input" name="date_tanggalsurat" class="form-control"><small class="form-text text-muted"></small></div>
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
                              <div class="col-3 col-md-3"><input type="year" id="text-input" name="year_tahunsurat" class="form-control"><small class="form-text text-muted"></small></div>                       
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
                              </small></div>
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
                      <a class="btn btn-danger text-white" href="{{route('kelompok.index')}}" type="reset">Kembali</a>
                  </div>
                 </form>
                </div>
</div>

@endsection