@extends('admin.layouts.master')

@section('content')

<div class="section-body">
<div class="section-header">
    <h5>{{$pagename}}</h5>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('surattugas.index')}}">Disposisi</a></div>
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
                    <form action="{{route('kelompokk.store')}}" method="post" enctype="multipart/form-data" class="form=horizontal">
                        @csrf
                        <div class="container">
                            <div class="row align-items-start">
                                <div class="col">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nomor Surat Tugas</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="int" id="text-input" name="nomor_surattugas" class="form-control" disabled value="$data->nomor_surattugas" >
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Pembuka</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="pembuka_surattugas" id="textarea-input" rows="9" style="height: 100px" class="form-control">
                                        Yang bertanda tangan di bawah ini, Direktur Politeknik Negeri Banyuwangi menugaskan Pegawai sebagai berikut:
                                    </textarea>
                                </div>
                            </div>
                            <!-- <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Kegiatan</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="jenis_kegiatan" id="textarea-input" rows="9" style="height: 100px" class="form-control" disabled placeholder="$data->jenis_kegiatan"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Hari, Tanggal Pelaksanaan</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="date" id="text-input" name="waktu_pelaksanaan" disabled value="$data->waktu_pelaksanaan" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Pukul Pelaksanaan</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="time" id="text-input" name="pukul_pelaksanaan" disabled value="$data->pukul_pelaksanaan" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Waktu Selesai</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="date" id="text-input" name="waktu_selesai" disabled value="$data->waktu_selesai" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Tempat</label>
                                </div>
                                <div class="col-6 col-md-6">
                                    <input type="text" id="text-input" name="tempat" disabled value="$data->tempat" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div> -->
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Penutup</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="penutup_surattugas" id="textarea-input" rows="9" style="height: 100px" class="form-control">
                                        Demikian Surat Tugas ini untuk dilaksanakan dengan penuh tanggung jawab, serta dipersiapkan dengan sebaik-baiknya.
                                    </textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Tanggal Pembuatan Surat Tugas</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="date" id="text-input" name="tanggal_surattugas" placeholder="Text" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nama Atasan</label>
                                </div>
                                <div class="col-6 col-md-6">
                                    <select name='namattd_surattugas' class="form-control">
                                        <option value="" label="pilih nama penanda tangan"></option>
                                        @foreach($data_User as $User)
                                        @if(!in_array($User->username, ['sekdir', 'kepegawaian', 'keuangan', 'superadmin', 'kajur']))
                                            <option value="{{$User->id}}">
                                                {{ $User->name }}
                                            </option>  
                                        @endif   
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">NIP Penanda Tangan</label>
                                </div>
                                <div class="col-6 col-md-6">
                                    <input type="text" id="text-input" name="nipttd_surattugas" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Jabatan Penanda Tangan</label>
                                </div>
                                <div class="col-6 col-md-6">
                                    <input type="text" id="text-input" name="jabatanttd_surattugas" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div> -->
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

<!-- penandatangan / atasan -->
<script type="text/javascript">
    let data_user = JSON.parse('{!! $data_User !!}')
    $(document).ready(function(){
        $(document).on('change', '.namapenandatangan_surattugas', function(){

            let namattd_surattugas = $('.namapenandatangan option').filter(':selected').val()
            let nip = data_user.filter(data => data.name == namapenandatangan_surattugas)[0].nip
            let jabatan = data_user.filter(data => data.name == namapenandatangan_surattugas)[0].jabatan
            console.log('jabatan', jabatan);
            console.log('data_user', data_user);
            $('[name="nipttd_surattugas"]').val(nip)
            $('[name="jabatanttd_surattugas"]').val(jabatan)
            
            // console.log(namapenandatangan, $('[name="nip_penandatangan"]'));
            // console.log(namapenandatangan, $('[name="jabatan_penandatangan"]'));
            // console.log(data_user.nip);
            // console.log(data_user.jabatan);

        });
    });
</script>

@endsection