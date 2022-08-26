@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header" style="top: 0; position: sticky; z-index: 890">
          <h5>{{$pagename_arsip}}</h5>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{route('kelompokk.index')}}">Surat Tugas</a></div>
            <div class="breadcrumb-item">{{ $pagename_arsip }}</div>
          </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          @if(session()->get('sukses'))
            <div class="alert alert-succes" style="color:green">
              {{session()->get('sukses')}}
            </div>
          @endif
          <div class="card-header">
            <h4>{{$pagename_arsip}}</h4>
          </div>
          <div class="col-12 col-md-12 col-lg-12">
              <div class="table-responsive">
                <table id="datatables" class="table table-striped table-md">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nomor Permohonan Surat</th>
                      <th>Kegiatan</th>
                      <th>Nomor Surat Tugas</th>
                      <th>Waktu Pelaksanaan</th>
                      <th>Tempat</th>
                      <th>Download Dokumen</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $row)
                    <tr>
                      <td>{{++$i}}</td>
                      <td>{{$row->nomor_permohonan}}</td>
                      <td>{{$row->jenis_kegiatan}}</td>
                      <td>{{$row->surat ? $row->surat->nomor_surattugas : '-'}}</td>
                      <td>{{$row->waktu_pelaksanaan}} <br> {{$row->waktu_selesai}}</td>
                      <td>{{$row->tempat}}</td>
                      <td>
                        <div class="d-flex justify-content-evenly">
                          @empty($row->disposisi->file_disposisi)
                          <a href="#" class="btn btn-secondary mx-2 disabled"> Disposisi </a>
                          @else
                          <a href="{{route('disposisidownload', $row->id)}}" class="btn btn-success mx-2"> Disposisi </a>
                          @endempty
                          
                          @empty($row->surat->file_surattugas)
                            <a href="#" class="btn btn-secondary mx-2 disabled"> Tugas </a>
                          @else
                            <a href="{{route('surrattugasdownload', $row->id) }}" class="btn btn-info"> Tugas </a>
                          @endempty  
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection