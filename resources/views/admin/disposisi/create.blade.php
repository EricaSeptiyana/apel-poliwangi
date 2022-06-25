@extends('admin.layouts.master')

@section('content')

<div class="section-body">
<div class="section-header">
    <h5>{{$pagename}}</h5>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('disposisi.index')}}">Disposisi</a></div>
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
                    <form action="{{route('disposisi.store')}}" method="post" enctype="multipart/form-data" class="form=horizontal">
                        @csrf
                        <div class="container">
                            <div class="row align-items-start">
                                <div class="col">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="kelompokk_id" value="{{ request()->id }}">
                        <div class="col">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nomor Agenda</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <input type="int" id="text-input" name="nomor_agenda" class="form-control" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal Terima</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <input type="date" id="text-input" name="tanggal_terima" class="form-control">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal Surat</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <input type="text" id="text-input" name="tanggal_permohonan"  disabled value="{{$disposisi->tanggal_permohonan}}" placeholder="Text" class="form-control">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nomor Surat</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <input type="string" id="text-input" name="nomor_permohonan"  disabled value="{{$disposisi->nomor_permohonan}}" class="form-control">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Lampiran</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <input type="string" id="text-input" name="lampiran"  disabled value="{{$disposisi->lampiran}}" class="form-control">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Hal</label>
                            </div>
                            <div class="col-3 col-md-9">
                                <input type="string" id="text-input" name="hal" disabled value="{{$disposisi->hal}}" class="form-control">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Pengirim</label>
                            </div>
                            <div class="col-3 col-md-9">
                                <input type="string" id="text-input" name="hal" disabled value="{{$disposisi->jabatan_penandatangan}}" class="form-control">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>

                        </div>
                        <div class="footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                            <a class="btn btn-danger text-white" href="{{route('kelompokk.index')}}" type="reset">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection