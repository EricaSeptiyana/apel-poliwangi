@extends('admin.layouts.master')

@section('content')

<div class="section-body">
<div class="section-header" style="top: 0; position: sticky; z-index: 890">
    <h5>{{$pagename}}</h5>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{url('/admin/profile')}}">Profile</a></div>
      <div class="breadcrumb-item">{{ $pagename }}</div>
    </div>
</div>

      <!-- Main Content -->
      <div class="main-content p-0">
        <section class="section">
          <div class="section-body">
            <h2 class="section-title">{{$datalogin->name}}
              <!-- {{$datalogin->username}} -->
            </h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
              <div class="card author-box card-primary">
                  <div class="card-body">
                    <div class="author-box-left">
                      <img alt="image" src="{{asset('public/assets/img/avatar/avatar-1.png')}}" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <!-- <a href="#" class="btn btn-primary mt-3 follow-btn" data-follow-action="alert('follow clicked');" data-unfollow-action="alert('unfollow clicked');">Follow</a> -->
                    </div>
                    <div class="author-box-details mt-4">
                      <div class="author-box-name">
                        <a href="#">{{$datalogin->name}}
                          <!-- {{$datalogin->username}} -->
                        </a>
                      </div>
                      <div class="author-box-job">
                        {{$datalogin->jabatan->nama_jabatan}}
                      </div>
                    </div>
                    <div class="author-box-description">
                      <div class="card-header mt-5">
                          <h4>Biodata Diri :</h4>
                      </div>
                      <div class="mx-4">
                        <p>Nama &emsp; &emsp; &emsp; &emsp;: 
                          {{$datalogin->name}}
                          <!-- {{$datalogin->username}} -->
                        </p>
                        <p>NIP/NIK &emsp; &emsp; &emsp; : 
                          {{$datalogin->nip}}
                        </p>
                        <p>Jabatan &emsp; &emsp; &emsp; &ensp;: 
                          {{$datalogin->jabatan->nama_jabatan}}
                        </p>
                        <p>Program Studi &emsp;: 
                          {{$datalogin->prodi->nama_prodi}}
                        </p>
                        <p>Email &emsp; &emsp; &emsp; &emsp;: 
                          {{$datalogin->email}}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <img alt="image" src="{{ asset('public/assets/img/avatar/avatar-1.png')}}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Posts</div>
                        <div class="profile-widget-item-value">187</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Followers</div>
                        <div class="profile-widget-item-value">6,8K</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Following</div>
                        <div class="profile-widget-item-value">2,1K</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name">{{$datalogin->name}} 
                    {{$datalogin->username}}
                      <div class="text-muted d-inline font-weight-normal">
                        <div class="slash">
                        </div>
                        {{$datalogin->jabatan}}
                      </div>
                    </div>
                    Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                  </div>
                  <div class="card-footer text-center">
                    <div class="font-weight-bold mb-2">Follow Ujang On</div>
                    <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-github mr-1">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-instagram">
                      <i class="fab fa-instagram"></i>
                    </a>
                  </div>
                </div> -->
              </div>
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form action="{{route('profile.update', $user->id)}}" method="post" class="needs-validation" novalidate="">
                        @csrf
                        @method('PATCH')
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>Nama Lengkap & Gelar</label>
                              <input type="text" name="name" class="form-control" value="{{$datalogin->name}}" required="">
                              <div class="invalid-feedback">
                                  Please fill in the first name
                              </div>
                            </div>
                            <!-- <div class="form-group col-md-6 col-12">
                              <label>Gelar</label>
                              <input type="text" name="username" class="form-control" value="{{$datalogin->username}}" required="">
                              <div class="invalid-feedback">
                                  Please fill in the last name
                              </div>
                            </div> -->
                            <div class="form-group col-md-5 col-12">
                              <label>NIP/NIK</label>
                              <input type="integer" name="nip" class="form-control" value="{{$datalogin->nip}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-7 col-12">
                              <label>Email</label>
                              <input type="email" name="email" class="form-control" value="{{$datalogin->email}}" required="">
                              <div class="invalid-feedback">
                                  Please fill in the email
                              </div>
                            </div>
                            <div class="form-group col-md-5 col-12">
                                <label>Foto TTD</label>
                                <input type="file" name="ttd" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-7 col-12">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" value="{{$datalogin->jabatan->nama_jabatan}}" required="">
                                <div class="invalid-feedback">
                                Please fill in the email
                                </div>
                            </div>
                            <div class="form-group col-md-5 col-12">
                                <label>Program Studi</label>
                                <input type="text" name="prodi" class="form-control" value="{{$datalogin->prodi->nama_prodi}}">
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="form-group col-md-7 col-12">
                              <label>Ubah Password</label>
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                              
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group col-md-7 col-12">
                                <label>Foto TTD</label>
                                <input type="file" name="ttd" class="form-control" value="">
                            </div>
                        </div> -->

                        <!-- <div class="row">
                            <div class="form-group col-12">
                            <label>Bio</label>
                            <textarea class="form-control summernote-simple">
                              Ujang maman is a superhero name in 
                              <b>Indonesia</b>, 
                              especially in my family. He is not a fictional character but an original hero in my family, 
                              a hero for his children and for his wife. So, I use the name as a user in this template. 
                              Not a tribute, I'm just bored with 
                              <b>'John Doe'</b>.
                            </textarea>
                            </div>
                        </div> -->
                        <!-- <div class="row">
                            <div class="form-group mb-0 col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                                <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                                <div class="text-muted form-text">
                                You will get new information about products, offers and promotions
                                </div>
                            </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Update</button>
                        <!-- <button class="btn btn-primary" data-toggle="modal" type="button" data-target="#updateprofileModal">Update</button>
                        <div class="modal fade" tabindex="-1" role="dialog" id="updateprofileModal" data-backdrop="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Unggah Surat Disposisi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor Surat Tugas</label></div>
                                            <div class="col-6 col-md-6"><input type="text" id="text-input" name="nomor_surat" placeholder="Nomor Surat Tugas" class="form-control"><small class="form-text text-muted"></small></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">File Surat Disposisi</label></div>
                                            <div class="col-12 col-md-9"><input type="file" id="file-input" name="file_disposisi" class="form-control-file"></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-whitesmoke br">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                        <button type="button" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection