@extends('admin.layouts.master')

@section('content')

<div class="section-body">
<div class="section-header">
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
                            <option value={{$role->id}}>
                                @if(in_array($role->id, $userRole))
                                    <!-- selected -->
                                @endif
                                <!-- > -->
                            {{$role->name}}
                            </option>

                            @endforeach                                            
                                    <!-- <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option> -->
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
                       
                        <!-- <div class="col">
                          <div class="form-group">
                            <label>NIDN</label>
                            <input type="text" class="form-control" placeholder="NIDN">
                          </div>
                          <div class="form-group">
                            <label>NIP/NIPPPK</label>
                            <input type="text" class="form-control" placeholder="NIP/NIPPPK">
                          </div>
                          <div class="form-group">
                            <label>Nama Pangkat</label>
                            <input type="text" class="form-control" placeholder="Nama Pangkat">
                          </div>
                          <div class="form-group">
                            <label>Nama user</label>
                            <input type="text" class="form-control" placeholder="Nama user">
                          </div>
                          <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control"></textarea>
                          </div>
                        </div> -->
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