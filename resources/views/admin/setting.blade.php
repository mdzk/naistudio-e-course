@extends('admin.template')
@section('nav')
  <li class="nav-item   ">
    <a class="nav-link" href="{{ url('admin') }}">
      <i class="material-icons">dashboard</i>
      <p>Dashboard</p>
    </a>
  </li>
  <li class="nav-item  ">
    <a class="nav-link" href="{{ url('admin/transaksi') }}">
      <i class="material-icons">notifications</i>
      <p>Transaksi</p>
    </a>
  </li>
  <li class="nav-item  ">
    <a class="nav-link" href="{{ url('admin/user') }}">
      <i class="material-icons">person</i>
      <p>User</p>
    </a>
  </li>
  <li class="nav-item  ">
    <a class="nav-link" href="{{ url('admin/materi') }}">
      <i class="material-icons">book</i>
      <p>Materi</p>
    </a>
  </li>
  <li class="nav-item  ">
    <a class="nav-link" href="{{ url('admin/kategori') }}">
      <i class="material-icons">bookmark</i>
      <p>Kategori</p>
    </a>
  </li>
  <li class="nav-item ">
    <a class="nav-link" href="{{ url('admin/video') }}">
      <i class="material-icons">play_arrow</i>
      <p>Video</p>
    </a>
  </li>
  <li class="nav-item active  ">
    <a class="nav-link" href="{{ url('admin/setting') }}">
      <i class="material-icons">settings</i>
      <p>Pengaturan</p>
    </a>
  </li>
@endsection
@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Profile</h4>
                  <p class="card-category">Complete this profile</p>
                </div>
                <div class="card-body">
                  <form enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <label>Photo</label>
                        <div class="form-group">
                          <label></label>
                          <input type="file" name="gambar" class="form-control" value="{{ $user->gambar }}">
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama *</label>
                          <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email *</label>
                          <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <input type="text" name="status" class="form-control" value="{{ $user->status }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Bio</label>
                          <div class="form-group">
                            <textarea class="form-control" name="bio" rows="2">{{ $user->bio }}</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password *</label>
                          <input type="password" name="password" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Verify Password *</label>
                          <input type="password" name="password2" class="form-control">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" @if(empty(Auth::user()->gambar))  src="{{ url('/') }}/assets/img/avatar-1.png" @else src="{{ url('') }}/assets/img/user/{{ Auth::user()->gambar }}" @endif />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">{{ Auth::user()->status }}</h6>
                  <h4 class="card-title">{{ Auth::user()->name }}</h4>
                  <p class="card-description">
                    {{ Auth::user()->bio }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection