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
                  @endif
                  <form action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data" class="form=horizontal">
                    @method('PATCH')
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama User</label></div>
                        <div class="col-12 col-md-9"><input type="text" value="{{$user->name}}" id="text-input" name="txtnama_user" placeholder="Isi Nama User Anda" class="form-control"><small class="form-text text-muted"></small></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Username</label></div>
                        <div class="col-12 col-md-9"><input type="text" value="{{$user->username}}" id="text-input" name="txt_username" placeholder="Isi Username" class="form-control"><small class="form-text text-muted"></small></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">NIP/NIPPPK</label></div>
                        <div class="col-12 col-md-9"><input type="text" value="{{$user->nip}}" id="text-input" name="txt_nip" placeholder="Isi NIP/NIPPPK Anda" class="form-control"><small class="form-text text-muted"></small></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Jabatan</label></div>
                        <div class="col-6 col-md-6">
                            <select name='nama_jabatan' class="form-control">
                            @if(is_array($data_jabatan) || $data_jabatan instanceof Traversable)
                                @foreach($data_jabatan as $jabatan)
                                    <option value={{$jabatan->nama_jabatan}}
                                        @if($jabatan->nama_jabatan==$data->nama_jabatan)
                                            selected
                                        @endif
                                    >
                                        {{$jabatan->nama_jabatan}}
                                    </option>    
                                @endforeach
                            @endif
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Prodi</label></div>
                        <div class="col-6 col-md-6">
                            <select name='nama_prodi' class="form-control">
                                @foreach((array) $data_prodi as $prodi)
                                    <option value={{$prodi->nama_prodi}}
                                        @if($prodi->nama_prodi==$data->nama_prodi)
                                            selected
                                        @endif
                                    >
                                        {{$prodi->nama_prodi}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email User</label></div>
                        <div class="col-12 col-md-9"><input type="text" value="{{$user->email}}" id="text-input" name="txtemail_user" placeholder="Isi Email User Anda" class="form-control"><small class="form-text text-muted"></small></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password</label></div>
                        <div class="col-12 col-md-9"><input type="password" value=" " id="text-input" name="txtpassword_user" placeholder="Isi Password User Anda" class="form-control"><small class="form-text text-muted"></small></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Konfirmasi Password</label></div>
                        <div class="col-12 col-md-9"><input type="password" id="text-input" name="txtkonfirmasipassword_user" placeholder="Isi Konfirmasi Password User Anda" class="form-control"><small class="form-text text-muted"></small></div>
                    </div>
                        
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Role</label></div>
                            <div class="col-12 col-md-9">
                            <select name="role_user" id="select" class="form-control">
                            
                            @foreach($allRoles as $role)
                            <option value={{$role->id}} >
                                @if(in_array($role->id, $userRole))
                                    <!-- selected -->
                                @endif
                                <!-- > -->
                            {{$role->name}}
                            </option>

                            @endforeach                                            
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Update</button>
                            <a class="btn btn-danger text-white" href="{{route('user.index')}}" type="reset">Kembali</a>
                        </div>
                      </div>
                        </div>
                      </div>

                    </div>
                  
                  <!-- <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div> -->
                 </form>
                </div>
</div>

@endsection