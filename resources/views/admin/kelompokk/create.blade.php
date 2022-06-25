@extends('admin.layouts.master')

@section('content')

<div class="section-body">
    <div class="section-header" style="top: 0; position: sticky; z-index: 890">
        <h5>{{$pagename}}</h5>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{url('/admin')}}">Dashboard</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{route('kelompokk.index')}}">Surat Tugas</a>
            </div>
            <div class="breadcrumb-item">
                {{ $pagename }}
            </div>
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
                                        <label for="text-input" class=" form-control-label">Nomor</label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <input type="string" id="text-input" name="nomor_permohonan" class="form-control"/>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Lampiran</label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <input type="string" id="text-input" name="lampiran" class="form-control"/>
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
                                        <textarea name="pembuka" id="textarea-input" rows="9" style="height: 100px" class="form-control">
                                            Sehubungan dengan akan dilaksanakan kegiatan (nama kegiatan), dengan nama pegawai berikut:
                                        </textarea>
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
                                    <div class="col-12 col-md-9">
                                        <textarea name="penutup" id="textarea-input" rows="9" style="height: 100px" class="form-control">
                                            maka dengan ini saya mengajukan permohonan surat tugas untuk (Kegiatan). Demikian surat permohonan ini kami sampaikan. Atas perhatiannya, diucapkan terima kasih.
                                        </textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Nama Penanda Tangan</label>
                                    </div>
                                    <div class="form-control col-6 col-md-6">
                                        <select name='nama_penandatangan' class="namapenandatangan">
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
                                        <input type="text" id="text-input" name="nip_penandatangan" class="form-control">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Jabatan Penanda Tangan</label>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <input type="text" id="text-input" name="jabatan_penandatangan" class="form-control">
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
                                                            <button type="button" id="addkaryawan" class="btn btn-success" style="float: right"> + </a>
                                                        </div>
                                                    </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="karyawan">
                                                <tr>
                                                    <td>{{++$i}}</td>
                                                    <td>
                                                        {{$datalogin->name}}
                                                        <input 
                                                            type="text" 
                                                            value="{{$datalogin->name}}" 
                                                            name="name[]"
                                                            style="display:none"
                                                        >
                                                    </td>
                                                    <td>
                                                        <input 
                                                            type="text" 
                                                            value="{{$datalogin->nip}}" 
                                                            name="nip[]"
                                                            style="display:none"
                                                        >
                                                        {{$datalogin->nip}}
                                                    </td>
                                                    <td><input type="text" name="jabatan[]" class="form-control"></td>
                                                    <th><a href="javascriipt:void(0)" id="remove" class="btn btn-danger deleteRow">-</a></th>
                                                </tr>
                                            </tbody>
                                        </table>
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
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<!-- penandatangan / atasan -->
<script type="text/javascript">
    let data_user_1 = JSON.parse('{!! $data_User !!}')
    $(document).ready(function(){
        $(document).on('change', '.namapenandatangan', function(){

            let namapenandatangan = $('.namapenandatangan option').filter(':selected').val()
            let nip = data_user_1.filter(data => data.name == namapenandatangan)[0].nip
            let jabatan = data_user_1.filter(data => data.name == namapenandatangan)[0].jabatan
            console.log('jabatan', jabatan);
            console.log('data_user_1', data_user_1);
            $('[name="nip_penandatangan"]').val(nip)
            $('[name="jabatan_penandatangan"]').val(jabatan)

        });
    });
</script>

<!-- penugasan karyawan -->
<script type="text/javascript">
    let data_user = JSON.parse('{!! $data_User !!}')
    function refresh_input_nama_listener() {
        $('[name="name[]"]').on('change', null).off('change');
        $('[name="name[]"]').on('change', function() {
            let nama = $(this).val();
            let input_nip_element = $(this).closest('tr').children()[2] // nip/nik input form
            let nip = data_user.filter(data => data.name == nama)[0].nip
            $(input_nip_element).children('[name="nip[]').val(nip)
        });
    }

    $('#addkaryawan').on('click', function(){
        addkaryawan();
    });
    function addkaryawan(){
        var karyawan = `
            <tr>
                <td>{{++$i}}</td>
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
                        <input type='text' name='nip[]' class='form-control'></td>
                    <td>
                        <input type='text' name='jabatan[]' class='form-control'></td>
                    <th>
                        <a href='javascriipt:void(0)' id='remove' class='btn btn-danger deleteRow'>-</a>
                    </th>
                </td>
            </tr>
        `;
        $('#karyawan').append(karyawan);
        refresh_input_nama_listener();
    };
    $('#remove').live('click', function(){
        $(this).parent().parent().remove();
    });
    

</script>



@endsection