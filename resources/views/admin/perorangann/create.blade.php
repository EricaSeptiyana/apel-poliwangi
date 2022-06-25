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
                    @elseif(session()->get('gagal'))
                        <div class="alert alert-succes" style="color:red">
                        {{session()->get('gagal')}}
                        </div>
                    @endif
                    <form action="{{route('perorangann.store')}}" method="post" enctype="multipart/form-data" class="form=horizontal">
                        @csrf
                        <div class="container">
                            <div class="row align-items-start">
                                <div class="col">
                            </div>
                        </div>
                            <!-- </div> -->
                        <div class="col">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nomor</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="string" id="text-input" name="nomor_permohonan" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Lampiran</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="string" id="text-input" name="lampiran" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Hal</label>
                                </div>
                                <div class="col-3 col-md-9">
                                    <input type="string" id="text-input" name="hal" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Tanggal Surat</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="date" id="text-input" name="tanggal_permohonan" placeholder="Text" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Kegiatan</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="jenis_kegiatan" id="textarea-input" rows="9" style="height: 100px" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Pembuka</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="pembuka" id="textarea-input" rows="9" style="height: 100px" class="form-control">Sehubungan dengan akan dilaksanakan kegiatan (nama kegiatan), dengan nama pegawai berikut:</textarea>
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
                                    <input type="string" id="text-input" name="jabatan"  class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Hari, Tanggal</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="date" id="text-input" name="waktu_pelaksanaan" placeholder="Text" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Pukul Pelaksanaan</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="time" id="text-input" name="pukul_pelaksanaan" placeholder="Text" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Waktu Selesai</label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="date" id="text-input" name="waktu_selesai" placeholder="Text" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Tempat</label>
                                </div>
                                <div class="col-6 col-md-6">
                                    <input type="text" id="text-input" name="tempat" class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Penutup</label>
                                    </div>
                                    <div class="col-12 col-md-9"><textarea name="penutup" id="textarea-input" rows="9" style="height: 100px" class="form-control">maka dengan ini saya mengajukan permohonan surat tugas untuk (Kegiatan). Demikian surat permohonan ini kami sampaikan. Atas perhatiannya, diucapkan terima kasih.</textarea>
                                    </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class="form-control-label">Nama Penanda Tangan</label>
                                </div>
                                <div class="form-control col-6 col-md-6">
                                    <select name='nama_penandatangan' class="namapenandatangan">
                                    <option value="" label="pilih nama penanda tangan"></option>
                                        @foreach($data_User as $User)
                                        @if(!in_array($User->username, ['sekdir', 'kepegawaian', 'keuangan', 'superadmin', 'kajur']))
                                            <option value="{{$User->id}}">
                                                {{$User->name}}
                                            </option>    
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class="nippenandatangan">NIP Penanda Tangan</label>
                                </div>
                                <div class="col-6 col-md-6">
                                    <input type="string" id="text-input" disabled name="nip_penandatangan"  class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class="jabatanpenandatangan">Jabatan Penanda Tangan</label>
                                </div>
                                <div class="col-6 col-md-6">
                                    <input type="string" id="text-input" disabled name="jabatan_penandatangan"  class="form-control">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <!-- </div> -->
                            <div class="footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                <a class="btn btn-danger text-white" href="{{route('kelompokk.index')}}" type="reset">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- penandatangan / atasan -->
<script type="text/javascript">
    let data_user = JSON.parse('{!! $data_User !!}')
    $(document).ready(function(){

        $('.namapenandatangan').on('change', async function() {

            const res = await $.ajax({
                url: `${$('meta[name=base-url]').attr('content')}/admin/user/${$(this).val()}`,
                dataType: 'json',
            });

            if (res.user) {
                $('input[name=nip_penandatangan]').val(res.user.nip);
                $('input[name=jabatan_penandatangan]').val(res.user.jabatan.nama_jabatan);
            }

        });

    });
</script>

@endsection