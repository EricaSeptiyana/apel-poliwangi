@extends('admin.layouts.master')

@section('content')

<div class="section-body">
<div class="section-header" style="top: 0; position: sticky; z-index: 890">
    <h5>{{$pagename}}</h5>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('user.index')}}">User</a></div>
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
                  <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data" class="form=horizontal">
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
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama User</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtnama_user" placeholder="Isi Nama User Anda" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>

                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Username</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="text-input" name="txt_username" placeholder="Isi Username" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>

                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">NIP/NIPPPK</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="text-input" name="txt_nip" placeholder="Isi NIP/NIPPPK Anda" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Jabatan</label></div>
                              <div class="col-6 col-md-6">
                              <select data-placeholder="Pilih Jabatan" name='jabatan_id' class="form-control">
                              <option value="" label="pilih jabatan"></option>
                                  @foreach($data_jabatan as $jabatan)
                                      <option value={{$jabatan->id}}>
                                          {{$jabatan->nama_jabatan}}</option>    
                                  @endforeach
                              </select>
                              </div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Program Studi</label></div>
                              <div class="col-6 col-md-6">
                              <select name='prodi_id' class="form-control">
                              <option value="" label="pilih program studi"></option>
                                  @foreach($data_prodi as $prodi)
                                      <option value={{$prodi->id}}>
                                          {{$prodi->nama_prodi}}</option>    
                                  @endforeach
                              </select>
                              </div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email User</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtemail_user" placeholder="Isi Email User Anda" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>

                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password</label></div>
                              <div class="col-12 col-md-9"><input type="password" id="text-input" name="txtpassword_user" placeholder="Isi Password User Anda" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>

                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Konfirmasi Password</label></div>
                              <div class="col-12 col-md-9"><input type="password" id="text-input" name="txtkonfirmasipassword_user" placeholder="Isi Konfirmasi Password User Anda" class="form-control"><small class="form-text text-muted"></small></div>
                          </div>
                              
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="select" class=" form-control-label">Role</label></div>
                                  <div class="col-12 col-md-9">
                                  <select name="role_user" id="select" class="form-control">
                                  <option value="" label="pilih role"></option>
                                  @foreach($allRoles as $role)
                                  <option value={{$role->id}}>
                                      {{$role -> name}}
                                  </option>
                                  @endforeach                                            
                                  </select>
                                </div>
                          </div>
                          <div class="form-group">
                            <div class="footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                <a class="btn btn-danger text-white" href="{{route('user.index')}}" type="reset">Kembali</a>
                            </div>
                          </div>
                 </form>
                </div>
</div>


@endsection