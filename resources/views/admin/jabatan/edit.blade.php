@extends('admin.layouts.master')

@section('content')


<div class="section-body">
<div class="section-header" style="top: 0; position: sticky; z-index: 890">
    <h5>{{$pagename}}</h5>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('jabatan.index')}}">Jabatan</a></div>
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
                  <form action="{{route('jabatan.update', $data->id)}}" method="post" enctype="multipart/form-data" class="form=horizontal">
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
                          <!-- <div class="form-group"> -->
                            <div class="footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Update</button>
                                <a class="btn btn-danger text-white" href="{{route('jabatan.index')}}" type="reset">Kembali</a>
                            </div>
                          <!-- </div> -->
                          <div class="form-group">
                            <label>Nama Jabatan</label>
                            <input type="text" name='nama_jabatan' value="{{$data->nama_jabatan}}" class="form-control">
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
                            <label>Nama Jabatan</label>
                            <input type="text" class="form-control" placeholder="Nama Jabatan">
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