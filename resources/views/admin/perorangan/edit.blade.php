@extends('admin.layouts.master')

@section('content')

 <!-- General CSS Files -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('public/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('public/assets/css/components.css')}}">

<div class="section-body">
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
                  <form action="{{route('perorangan.update', $data->id)}}" method="post" enctype="multipart/form-data" class="form=horizontal">
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
                            <!-- <div class="footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Update</button>
                                <button class="btn btn-danger" type="reset">Kembali</button>
                            </div> -->
                          <!-- </div> -->
                          <div class="form-group">
                            <label>Pembuka</label>
                            <textarea type="textarea" name='txt_pembuka' class="form-control" placeholder="Pembuka">{{$data->pembuka}}</textarea>
                            <!-- <input type="textarea" name='txt_pembuka' value="{{$data->pembuka}}" class="form-control" placeholder="Pembuka"> -->
                          </div>
                          <div class="form-group">
                            <label>Nama Yang Ditugaskan</label>
                            <!-- <input type="text" name='txt_nama' value="{{$data->nama}}" class="form-control" placeholder="Nama"> -->
                            <select name='nama' class="form-control">
                                @foreach($data_User as $User)
                                    <option value={{$User->name}}>
                                        {{$User->name}}</option>
                                @endforeach
                                <!-- <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option> -->
                            </select>
                          </div>
                          <div class="form-group">
                            <label>NIP/NIPPPK</label>
                            <input type="text" name='nip_nipppk' value="{{$data->nip_nipppk}}" class="form-control" placeholder="NIP/NIPPPK">
                          </div>
                          <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name='txt_jabatan' value="{{$data->jabatan}}" class="form-control" placeholder="Jabatan">
                          </div>
                          <div class="form-group">
                            <label>Jenis Kegiatan</label>
                            <input type="text" name='jenis_kegiatan' value="{{$data->jenis_kegiatan}}" class="form-control" placeholder="Kegiatan">
                          </div>
                          <div class="form-group">
                            <label>Waktu Mulai</label>
                            <input type="date" name='waktu_mulai' value="{{$data->waktu_mulai}}" class="form-control" placeholder="WIB">
                          </div>
                          <div class="form-group">
                            <label>Waktu Selesai</label>
                            <input type="date" name='waktu_selesai' value="{{$data->waktu_selesai}}" class="form-control" placeholder="WIB">
                          </div>
                          <div class="form-group">
                            <label>Tempat</label>
                            <input type="text" name='txt_tempat' value="{{$data->tempat}}" class="form-control" placeholder="Tempat">
                          </div>
                          <div class="form-group">
                            <label>File Undangan (Jika Ada)</label>
                            <input type="file" name='file_undangan' value="{{$data->file_undangan}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>File Disposisi (Jika Ada)</label>
                            <input type="file" name="file_disposisi" value="{{$data->file_disposisi}}" class="form-control">
                          </div>

                          <!-- KHUSUS SEKDIR -->
                          <div class="form-group">
                            <label>Tanggal Surat</label>
                            <input type="date" name='date_tanggalsurat' value="{{$data->tanggal_surat}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Nomor</label>
                            <input type="int" name='int_nomor' disabled value="{{$data->nomor}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Kode</label>
                            <input type="int" name='int_kode' value="{{$data->kode_surat}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Jenis Surat</label>
                            <input type="string" name='string_jenissurat' value="{{$data->jenis_surat}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Tahun Surat</label>
                            <input type="year" name='year_tahunsurat' value="{{$data->tahun_surat}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Nama / NIP Penanda Tangan</label>
                            <select name='optionid_user' class="form-control">
                                @foreach($data_User as $User)
                                    <option value={{$User->id}}
                                        @if($User->id==$data->penanda_tangan)
                                            selected
                                        @endif
                                    >
                                        {{$User->name}} / {{$User->nip}}</option>    
                                @endforeach
                                <!-- <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>-->
                            </select>
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
                  </div>-->
                  <div class="footer text-right">
                      <button class="btn btn-primary mr-1" type="submit">Update</button>
                      <a class="btn btn-danger text-white" href="{{route('perorangan.index')}}" type="reset">Kembali</a>
                  </div>
                 </form>
                </div>
</div>

 <!-- General JS Scripts -->
 <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('public/assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('public/assets/js/scripts.js')}}"></script>
  <script src="{{ asset('public/assets/js/custom.js')}}"></script>

@endsection