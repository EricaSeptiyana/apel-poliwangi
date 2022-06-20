@extends('admin.layouts.master')

@section('content')
 
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
<div class="section-header" style="top: 0; position: sticky; z-index: 890">
    <h5>{{$pagename}}</h5>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('roles.index')}}">Role</a></div>
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
                  <form action="{{route('roles.update', $role->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @method('PATCH')          
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Role</label></div>
                        <div class="col-12 col-md-9"><input type="text"  id="text-input" name="nama_role" value="{{$role->name}}" class="form-control"><small class="form-text text-muted"></small></div>
                    </div>
                    
                    <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Permission</label></div>
                              <div class="col-6 col-md-6">
                              <select name='optionid_permission[]' class="form-control">
                                @foreach($allPermission as $permission)

                                    <option value={{$permission->id}}
                                        @if (in_array($permission->id, $rolePermission))
                                            selected
                                        @endif
                                        
                                        >
                                        {{$permission -> name}}</option>

                                @endforeach
                              </select>
                              </small></div>
                          </div>

 
                    <!-- <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Simpan
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button> -->

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

@endsection