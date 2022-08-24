@extends('admin.layouts.master')

@section('content')

<div class="section-body">
<div class="section-header" style="top: 0; position: sticky; z-index: 890">
    <h5>{{$pagename_rekap}}</h5>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('kelompokk.index')}}">Cetak Laporan</a></div>
      <div class="breadcrumb-item">{{ $pagename_rekap }}</div>
    </div>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-body card-block">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>{{$pagename_rekap}}</h4>
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
                    <form action="{{route('cetak-surat-form')}}" method="post" enctype="multipart/form-data" class="form=horizontal">
                    @csrf
                        <div class="container">
                            <div class="row align-items-start">
                                <div class="col">
                                <div class="card-header-action">
                                    <div class="row form-group mx-2 my-2">
                                        <div class="col col-md-2">
                                            <label for="text-input" class=" form-control-label">Dari Tanggal:</label>
                                        </div>
                                        <div class="col col-md-2">
                                            <input type="date" required id="tglawal" name="tglawal" value="<?php echo date('Y-m-d'); ?>" placeholder="Text" class="form-control">
                                            <small class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="row form-group mx-2 my-2">
                                        <div class="col col-md-2">
                                            <label for="text-input" class=" form-control-label">Sampai Tanggal:</label>
                                        </div>
                                        <div class="col col-md-2">
                                            <input type="date" required id="tglakhir" name="tglakhir" value="<?php echo date('Y-m-d'); ?>" placeholder="Text" class="form-control">
                                            <small class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer text-right">
                            <a href="" onclick="this.href='/surattugas/admin/kelompokk/cetak-surat-pertanggal/'+ document.getElementById('tglawal').value + 
                            '/' + document.getElementById('tglakhir').value " target="_blank" class="btn btn-primary text-white">
                                Cetak
                                <i class="fas fa-print"></i>
                            </a>
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