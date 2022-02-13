@extends('admin.layouts.master')

@section('content')

 <!-- General CSS Files -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('public/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('public/assets/css/components.css')}}">

<div class="section-body">
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
                                  
                                  @foreach($allRoles as $role)
                                  <option value={{$role->id}}>
                                      {{$role -> name}}
                                  </option>

                                  @endforeach                                            
                                          <!-- <option value="0">Please select</option>
                                          <option value="1">Option #1</option>
                                          <option value="2">Option #2</option>
                                          <option value="3">Option #3</option> -->
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

 <!-- General JS Scripts -->
 <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('public/assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('public/assets/js/scripts.js')}}"></script>
  <script src="{{ asset('public/assets/js/custom.js')}}"></script>

@endsection