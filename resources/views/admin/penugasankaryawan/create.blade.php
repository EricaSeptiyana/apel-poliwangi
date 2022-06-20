@extends('admin.layouts.master')

@section('content')

<div class="section-body">
<div class="section-header" style="top: 0; position: sticky; z-index: 890">
    <h5>{{$pagename}}</h5>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('penugasankaryawan.index')}}">Surat Tugas</a></div>
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
                  <form action="{{route('penugasankaryawan.store')}}" method="post" enctype="multipart/form-data" class="form=horizontal">
                   @csrf
                  <div class="container">
                      <div class="row align-items-start">
                          @php
                            $success = Session::get('success');
                          @endphp
                          @if ($success)
                            <div class="alert alert-success">{{$success}}</div>
                          @endif
                      </div>
                    </div>
                        </div>

                    <!-- PENUGASAN KARYAWAN -->
                    <div class="card">
                                <div class="card-header">
                                <h4 id="penugasankaryawan">Penugasan Karyawan</h4>
                                </div>
                                <div class="card-body pb-0">
                                <p class="text-muted">Masukkan Nama-Nama Karyawan Yang Ditugaskan</p>

                                <div class="form-group col-md-12 flex">
                                    <table class="table table-striped table responsive" id="tabel1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NIP/NIK</th>
                                                <th>Jabatan</th>
                                                <th>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-12">
                                                        <a href="#penugasankaryawan" id="addkaryawan" class="btn btn-success" style="float: right"> + </a>
                                                    </div>
                                                </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="karyawan">
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{$datalogin->name}}</td>
                                                <td>{{$datalogin->nip}}</td>
                                                <td><input type="text" name="jabatan[]" class="form-control"></td>
                                                <th><a href="javascriipt:void(0)" id="remove" class="btn btn-danger deleteRow">-</a></th>
                                            </td>
                                        </tr>
                                        </tbody>
                                
                                    </table>
                                </div>
                        </div>
                        <div class="footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                            <a class="btn btn-danger text-white" href="{{route('penugasankaryawan.index')}}" type="reset">Kembali</a>
                        </div>
                    </div>
                 </form>
                </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<script type="text/javascript">
    $('#addkaryawan').on('click', function(){
        addkaryawan();
    });
    function addkaryawan(){
        // var karyawan = '<div><div class="form-group col-md-12 flex"><table class="table table-striped" id="tabel1"><thead><tr><th>No</th><th>Nama</th><th>NIP/NIK</th><th>Jabatan</th><th>Aksi</th></tr><tr><td>1</td><td><div class="col"><select name='anggota3' id="select" class="form-control"><option value="" label="pilih karyawan"></option>@foreach($data_User as $User)<option value={{$User->name}}>{{$User->name}}</option>@endforeach</select></div></td><td><div class="col"><input type="string" id="text-input" placeholder="{{$datalogin->nip}}" name="nip3" disabled value="{{$datalogin->nip}}" class="form-control"><small class="form-text text-muted"></small></div></td><td><div class="col"><input type="string" id="text-input" name="jabatan3" class="form-control"><small class="form-text text-muted"></small></div>   </td><td> <button class="btn-sm btn-danger" id="hapus">-</button></td></tr></thead></table></div></div>'
        var karyawan = "<tr>"+
                  "<td>{{++$i}}</td>"+
                  "<td>"+
                      "<div class='col'>"+
                          "<select name='name' id='select' class='form-control'>"+
                          "<option value='' label='pilih karyawan'></option>"+
                              "@foreach($data_User as $User)"+
                                  "<option value={{$User->name}}>"+
                                      "{{$User->name}}</option>"+    
                                      
                              "@endforeach"+
                          "</select>"+
                      "</div>"+
                  "</td>"+
                  "<td><input type='text' name='nip[]' class='form-control'></td>"+
                  "<td><input type='text' name='jabatan[]' class='form-control'></td>"+
                  "<th><a href='javascriipt:void(0)' id='remove' class='btn btn-danger deleteRow'>-</a></th>"+
                  "</td>"+
              "</tr>"
        $('#karyawan').append(karyawan);
    };
    $('#remove').live('click', function(){
        $(this).parent().parent().remove();
    });

</script>

@endsection