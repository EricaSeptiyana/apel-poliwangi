@extends('admin.layouts.master')

@section('content')

<div class="section-body">
<div class="section-header" style="top: 0; position: sticky; z-index: 890">
    @role('karyawan')
        @if($selectUser->tipe_surat == 'kelompok')
        <h5>{{$pagename_kelompok}}</h5>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{route('kelompokk.index')}}">Surat Tugas</a></div>
            <div class="breadcrumb-item">{{ $pagename_kelompok }}</div>
        </div>
        @elseif($selectUser->tipe_surat == 'perorangan')
        <h5>{{$pagename_perorangan}}</h5>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{route('kelompokk.index')}}">Surat Tugas</a></div>
            <div class="breadcrumb-item">{{ $pagename_perorangan }}</div>
        </div>
        @endif
    @endrole

    @role('sekdir')
        <h5>{{$pagename_disposisi}}</h5>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{route('kelompokk.index')}}">Surat Tugas</a></div>
            <div class="breadcrumb-item">{{ $pagename_disposisi }}</div>
        </div>
    @endrole

    @role('kepegawaian')
        <h5>{{$pagename_surattugas}}</h5>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{route('kelompokk.index')}}">Surat Tugas</a></div>
            <div class="breadcrumb-item">{{ $pagename_surattugas }}</div>
        </div>
    @endrole
</div>
<div class="col-12">
    <div class="card">
        <div class="card-body card-block">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        @role('karyawan')
                            @if($selectUser->tipe_surat == 'kelompok')
                                <h4>{{$pagename_kelompok}}</h4>
                            @elseif($selectUser->tipe_surat == 'perorangan')
                                <h4>{{$pagename_perorangan}}</h4>
                            @endif
                        @endrole

                        @role('sekdir')
                            <h4>{{$pagename_disposisi}}</h4>
                        @endrole

                        @role('kepegawaian')
                            <h4>{{$pagename_surattugas}}</h4>
                        @endrole
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
                        <!-- </div> -->
                        <form action="{{route('kelompokk.update', $data->id)}}" method="post" enctype="multipart/form-data" class="form=horizontal">
                            @method('PATCH')
                            @csrf
                            <div class="container">
                                <div class="row align-items-start">
                                    <div class="col">
                                    </div>
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
                                    <label for="text-input" class=" form-control-label">Tanggal Terima</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="date" id="text-input" name="tanggal_terima" placeholder="Text" class="form-control">
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
                                    <label for="text-input" class=" form-control-label">Nomor Surat</label>
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
                                    <input type="string" id="text-input" name="hal" value="{{$data->hal}}" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Pengirim</label>
                                </div>
                                <div class="col-3 col-md-9">
                                    <input type="string" id="text-input" name="hal" value="{{$data->jabatan_penandatangan}}" class="form-control">
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
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nama Penanda Tangan</label>
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
                            @if($selectUser->tipe_surat == 'kelompok')
                            <div class="col">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Nomor</label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                            <input type="string" id="text-input" name="nomor_permohonan" value="{{$data->nomor_permohonan}}" class="form-control">
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
                                <!-- <div class="row form-group">
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
                                        <input type="string" id="text-input" placeholder="{{$datalogin->jabatan->nama_jabatan}}" name="jabatan" value="{{$datalogin->jabatan->nama_jabatan}}" disabled class="form-control">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div> -->
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
                                        <label for="text-input" class=" form-control-label">Nama Atasan</label>
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
                                        <label for="text-input" class=" form-control-label">NIP / NIK Atasan</label>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <input type="text" id="text-input" name="nip_penandatangan" value="{{$data->nip_penandatangan}}" class="form-control">
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
                                        <input type="text" id="text-input" name="jabatan_penandatangan" value="{{$data->jabatan_penandatangan}}" class="form-control">
                                        <small class="form-text text-muted"></small>
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
                                                    <!-- <th><a href="#penugasankaryawan" class="btn btn-success addRow">+</a></th> -->
                                                    <th>
                                                    <!-- <div id="karyawan"></div> -->
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"></label>
                                                        <div class="col-sm-12">
                                                            <button type="button" id="addkaryawan" class="btn btn-success" style="float: right" @click="addkaryawan()"> + </a>
                                                        </div>
                                                    </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="karyawan">
                                                @foreach($datapenugasan as $penugasan)
                                                <tr>
                                                    <td class="index-number">{{++$i}}</td>
                                                    <td>
                                                        {{$penugasan->name}}
                                                        <input 
                                                            type="text" 
                                                            value="{{$penugasan->name}}" 
                                                            name="name[]"
                                                            style="display:none"
                                                        >
                                                        <input 
                                                            type="text" 
                                                            value="{{$penugasan->id}}" 
                                                            name="id[]"
                                                            style="display:none"
                                                        >
                                                        <input 
                                                            type="text" 
                                                            value="{{ $selectUser->user_id }}"
                                                            name="user_id"
                                                            style="display:none"
                                                        >
                                                    </td>
                                                    <td>
                                                        <input 
                                                            type="text" 
                                                            value="{{$penugasan->nip}}" 
                                                            name="nip[]"
                                                            style="display:none"
                                                        >
                                                        {{$penugasan->nip}}
                                                    </td>
                                                    <td><input type="text" name="jabatan[]" value="{{$penugasan->jabatan}}" class="form-control"></td>
                                                    <th><a href="javascript:void(0)" class="btn btn-danger deleteRow">-</a></th>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>                                 
                                </div>
                            </div>
                            @elseif($selectUser->tipe_surat == 'perorangan')
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
                                        <input type="string" id="text-input"  name="jabatan" value="{{$data}}" class="form-control">
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
                            @endif
                            <!-- {{$selectUser->tipe_surat}} -->
                            @endrole
                            <div class="footer text-right">
                                <!-- <button class="btn btn-primary mr-1" type="submit">Update</button> -->
                                @role('karyawan')
                                <button class="btn btn-primary mr-1" type="submit">Update</button>
                                @endrole
                
                                @role('sekdir')
                                <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                @endrole
            
                                @role('kepegawaian')
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
</div>

<!-- penandatangan / atasan di tampilan karyawan-->
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

<!-- penandatangan / atasan di tampilan kepegawaian-->
<!-- <script type="text/javascript">
    let data_user = JSON.parse('{!! $data_User !!}')
    $(document).ready(function(){
        $(document).on('change', '.namattd_surattugas', function(){
            let namattd_surattugas = $('.namattd_surattugas option').filter(':selected').val()
            let nip = data_user.filter(data => data.name == nipttd_surattugas)[0].nip
            let jabatan = data_user.filter(data => data.name == jabatanttd_surattugas)[0].jabatan
            $('[name="nipttd_surattugas"]').val(nip)
            $('[name="jabatanttd_surattugas"]').val(jabatan)
            
            console.log(namattd_surattugas, $('[name="nipttd_surattugas"]'));
            console.log(namattd_surattugas, $('[name="jabatanttd_surattugas"]'));
            console.log(data_user.nip);
            console.log(data_user.jabatan);

        });
    });
</script> -->

<!-- penugasan karyawan -->
<script type="text/javascript">

    let currentIndex = parseInt($('.index-number')[$('.index-number').length - 1].innerHTML) + 1;

    $('#addkaryawan').on('click', function(){
        addkaryawan();
    });
    function addkaryawan(){

        console.log(currentIndex);

        var karyawan = `
            <tr>
                <td class="index-number">${currentIndex++}</td>
                    <td>
                        <div class='col'>
                            <select name='name[]' id='select' class='form-control'>
                                <option value='' label='pilih karyawan'></option>
                                @foreach($data_User as $User)
                                @if(!in_array($User->username, ['sekdir', 'kepegawaian', 'keuangan', 'superadmin', 'kajur']))
                                    <option value="{{$User->name}}">
                                        {{$User->name}}
                                    </option>  
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <input 
                            type="text" 
                            name="id[]"
                            style="display:none"
                        >
                        <input 
                            type="text" 
                            value="{{ $selectUser->user_id }}"
                            name="user_id"
                            style="display:none"
                        >
                        <input type='text' name='nip[]' class='form-control'></td>
                    <td>
                        <input type='text' name='jabatan[]' class='form-control'></td>
                    <th>
                        <a href='javascript:void(0)' class='btn btn-danger deleteRow'>-</a>
                    </th>
                </td>
            </tr>
        `;
        $('#karyawan').append(karyawan);
        $('.deleteRow').unbind().on('click', function(){
            console.log(parseInt($('.index-number')[$('.index-number').length - 1].innerHTML) + 1);
            $(this).parent().parent().remove();
            currentIndex = parseInt($('.index-number')[$('.index-number').length - 1].innerHTML) + 1;
        });
    };
    $('.deleteRow').on('click', function(){
        $(this).parent().parent().remove();
        currentIndex = parseInt($('.index-number')[$('.index-number').length - 1].innerHTML) + 1;
    });

</script>

@endsection