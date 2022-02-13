@extends('admin.layouts.master')

@section('content')


 <!-- General CSS Files -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('public/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('public/assets/css/components.css')}}">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> 

  <script>
    $(document).ready(function() {
        $(".mul-select").select2({
            placeholder: "pilih permission ....",
            tags: true,
            tokenSeparators: ['/', ',', ';', ' '],
            width: "100%"
        });

    })
  </script>

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
                  <form action="{{route('roles.update', $role->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @method('PATCH')          
                    @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Role</label></div>
                                <div class="col-12 col-md-9"><input type="text" valu="{{$role->name}}" id="text-input" name="nama_role" placeholder="Text" class="form-control"><small class="form-text text-muted"></small></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Permission</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="optionid_permission[]" id="select" class="mul-select" multiple='true'>

                                        @foreach($allPermission as $permission)

                                        <option value={{$permission->id}}
                                            @if (in_array($permission->id, $rolePermission))
                                                selected
                                            @endif
                                        
                                        >
                                            {{$permission -> name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Simpan
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button> -->

                        </form>
                  <!-- <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data" class="form=horizontal">
                   @csrf -->
                  <!-- <div class="container">
                      <div class="row align-items-start">
                        <div class="col">
                      </div>
                    </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label>Nama Role</label>
                            <input type="text" name='nama_role' class="form-control">
                          </div>
                          <div class="form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Permission</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="optionid_permission[]" id="select" class="mul-select" multiple='true'>

                                        @foreach($allPermission as $permission)

                                        <option value={{$permission->id}}>
                                            {{$permission -> name}}
                                        </option>

                                        @endforeach
                                    </select>
                                </div>
                          </div>
                      </div>

                  </div> -->
                  
                  
                  <div class="footer text-right">
                      <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                      <a class="btn btn-danger text-white" href="{{route('roles.index')}}" type="reset">Kembali</a>
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

  <script src="{{ asset('public/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('public/admin/vendors/popper.js/dist/umd/popper.min.js')}}"></script>

@endsection