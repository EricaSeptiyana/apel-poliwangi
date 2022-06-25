@extends('admin.layouts.master')

@section('content')

<div class="section-body">
<div class="section-header" style="top: 0; position: sticky; z-index: 890">
    <h5>{{$pagename}}</h5>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('kelompokk.index')}}">Surat Tugas</a></div>
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
                    <form action="{{route('perorangann.update', $data->id)}}" method="post" enctype="multipart/form-data" class="form=horizontal">
                        @method('PATCH')
                        @csrf
                        <div class="container">
                            <div class="row align-items-start">
                                <div class="col">
                            </div>
                        </div>

                        @role('sekdir')
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nomor Agenda</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <input type="int" id="text-input" name="nomor_agenda" class="form-control"value="{{$data->nomor_agenda}}" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal Surat</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <input type="date" id="text-input" name="tanggal_permohonan"  disabled value="{{$data->tanggal_permohonan}}" placeholder="Text" class="form-control">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nomor</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <input type="string" id="text-input" name="nomor_permohonan"  disabled value="{{$data->nomor_permohonan}}" class="form-control">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Lampiran</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <input type="string" id="text-input" name="lampiran"  disabled value="{{$data->lampiran}}" class="form-control">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Hal</label>
                            </div>
                            <div class="col-3 col-md-9">
                                <input type="string" id="text-input" name="hal" disabled value="{{$data->hal}}" class="form-control">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        @endrole

                        @role('kepegawaian')
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nomor Surat Tugas</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="int" id="text-input" name="nomor_agenda" class="form-control"value="{{$data->nomor_surattugas}}" >
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
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nama</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="string" id="text-input" placeholder="{{$datalogin->name}}" name="nama" disabled value="{{$datalogin->name}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">NIP/NIPPPK</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="string" id="text-input" placeholder="{{$datalogin->nip}}" name="nip" disabled value="{{$datalogin->nip}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Jabatan</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="string" id="text-input" placeholder="{{$datalogin->jabatan}}" name="jabatan" value="{{$datalogin->jabatan}}" disabled class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Kegiatan</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="jenis_kegiatan" id="textarea-input" rows="9" style="height: 100px" class="form-control">{{$data->jenis_kegiatan}}</textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Hari, Tanggal Pelaksanaan</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="date" id="text-input" name="waktu_pelaksanaan" value="{{$data->waktu_pelaksanaan}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Pukul Pelaksanaan</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="time" id="text-input" name="pukul_pelaksanaan" value="{{$data->pukul_pelaksanaan}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Waktu Selesai</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="date" id="text-input" name="waktu_selesai" value="{{$data->waktu_selesai}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Tempat</label>
                                </div>
                                <div class="col-6 col-md-6">
                                    <input type="text" id="text-input" name="tempat" value="{{$data->tempat}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
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
                            <!-- <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nama Direktur</label>
                                </div>
                                <div class="col-6 col-md-6">
                                    <select name='namattd_surattugas' class="form-control">
                                        <option value="" label="pilih nama penanda tangan">
                                        </option>
                                        @foreach($data_User as $User)
                                            <option value="{{$User->name}}">
                                                {{ $User->name }}
                                            </option>     
                                        @endforeach
                                    </select>
                                </div>
                            </div> -->
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nama Penanda Tangan</label>
                                </div>
                                <div class="col-6 col-md-6">
                                    <select name='namattd_surattugas' class="form-control">
                                        <option value="" label="pilih nama penanda tangan"></option>
                                        @foreach($data_User as $User)
                                            <option value="{{$User->name}}">
                                                {{ $User->name }}
                                            </option>     
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
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
                            </div>
                            @endrole

                        @role('karyawan')
                        <div class="col">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nomor</label>
                                </div>
                                <div class="col-3 col-md-3"><input type="string" id="text-input" name="nomor_permohonan" value="{{$data->nomor_permohonan}}" class="form-control">
                                <small class="form-text text-muted"></small>
                            </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Lampiran</label>
                                    </div>
                                <div class="col-3 col-md-3">
                                    <input type="string" id="text-input" name="lampiran" value="{{$data->lampiran}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                             </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Hal</label>
                                </div>
                                <div class="col-3 col-md-9">
                                    <input type="string" id="text-input" name="hal" value="{{$data->hal}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Tanggal Surat</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="date" id="text-input" name="tanggal_permohonan" value="{{$data->tanggal_permohonan}}" placeholder="Text" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Kegiatan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="jenis_kegiatan" id="textarea-input" rows="9" style="height: 100px" class="form-control">{{$data->jenis_kegiatan}}</textarea>
                                    </div>
                            </div>
                            <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Pembuka</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="pembuka" id="textarea-input" rows="9" style="height: 100px" class="form-control">{{$data->pembuka}}</textarea>
                                    </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nama</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="string" id="text-input" placeholder="{{$datalogin->name}}" name="nama" disabled value="{{$datalogin->name}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">NIP/NIPPPK</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="string" id="text-input" placeholder="{{$datalogin->nip}}" name="nip" disabled value="{{$datalogin->nip}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Jabatan</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="string" id="text-input"  name="jabatan" value="{{$data->jabatan}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Hari, Tanggal</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="date" id="text-input" name="waktu_pelaksanaan" value="{{$data->waktu_pelaksanaan}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Pukul Pelaksanaan</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="time" id="text-input" name="pukul_pelaksanaan" value="{{$data->pukul_pelaksanaan}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Waktu Selesai</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="date" id="text-input" name="waktu_selesai" value="{{$data->waktu_selesai}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Tempat</label>
                                </div>
                                <div class="col-6 col-md-6">
                                    <input type="text" id="text-input" name="tempat" value="{{$data->tempat}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Penutup</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="penutup" id="textarea-input" rows="9" style="height: 100px" class="form-control">{{$data->pembuka}}</textarea>
                                    </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class="form-control-label">Nama Penanda Tangan</label>
                                </div>
                                <div class="form-control col-6 col-md-6">
                                    <select name='nama_penandatangan' class="namapenandatangan">
                                        @foreach($data_User as $User)
                                        @if(!in_array($User->username, ['sekdir', 'kepegawaian', 'keuangan', 'superadmin', 'kajur']))
                                            <option value="{{$User->id}}"
                                                @if($User->name==$data->nama_penandatangan)
                                                    selected
                                                @endif
                                            >
                                                {{$User->name}}</option> 
                                        @endif   
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">NIP Penanda Tangan</label>
                                </div>
                                <div class="col-6 col-md-6">
                                    <input type="string" id="text-input" name="nip_penandatangan" value="{{$data->nip_penandatangan}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <!-- <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">NIP Penanda Tangan</label>
                                </div>
                                <div class="col-6 col-md-6">
                                    <select name='nip_penandatangan' class="form-control">
                                        @foreach($data_User as $User)
                                            <option value={{$User->nip}}
                                                @if($User->nip==$data->nip_penandatangan)
                                                    selected
                                                @endif
                                            >
                                                {{$User->nip}}</option>    
                                        @endforeach
                                    </select>
                                </div>
                            </div> -->
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Jabatan Penanda Tangan</label>
                                </div>
                                <div class="col-6 col-md-6">
                                    <input type="string" id="text-input" name="jabatan_penandatangan" value="{{$data->jabatan_penandatangan}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                        </div>
                        @endrole
                        <div class="footer text-right">
                            @role('karyawan')
                            <button class="btn btn-primary mr-1" type="submit">Update</button>
                            @endrole
            
                            @role('sekdir')
                            <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                            @endrole
                            <a class="btn btn-danger text-white" href="{{route('kelompokk.index')}}" type="reset">Kembali</a>
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
        $(document).on('change', '.namapenandatangan', function(){

            // var cat_id=$(this).val();
            // console.log(cat_id);
        // });

        // $(document).on('change', '.namapenandatangan', function(){
            // var nip_id=$(this).val();

            let namapenandatangan = $('.namapenandatangan option').filter(':selected').val()
            let nip = data_user.filter(data => data.name == namapenandatangan)[0].nip
            let jabatan = data_user.filter(data => data.name == namapenandatangan)[0].jabatan
            $('[name="nip_penandatangan"]').val(nip)
            $('[name="jabatan_penandatangan"]').val(jabatan)
            
            console.log(namapenandatangan, $('[name="nip_penandatangan"]'));
            console.log(namapenandatangan, $('[name="jabatan_penandatangan"]'));
            console.log(data_user.nip);
            console.log(data_user.jabatan);

        });
    });
</script>

@endsection