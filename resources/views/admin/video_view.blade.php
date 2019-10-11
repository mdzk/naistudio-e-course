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
  <li class="nav-item active ">
    <a class="nav-link" href="{{ url('admin/video') }}">
      <i class="material-icons">play_arrow</i>
      <p>Video</p>
    </a>
  </li>
  <li class="nav-item  ">
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
          <div class="col-md-12">
            {{-- <a href="{{ url('admin/video') }}" class="btn btn-danger">Back</a> --}}
            <h3>{{ $video->nama_video }}</h3>
            <div class="card card-profile">
              <div class="card-body">
                {{-- <img style="width: 100%;max-width: 100%" @if(empty($video->thumbnail))  src="{{ url('/') }}/assets/img/no-img.jpg" @else src="{{ url('') }}/video/{{ $video->thumbnail }}" @endif /> --}}
                <video width="100%" height="auto" poster="{{ url('video/'.$video->thumbnail) }}" controls autoplay>
                  <source src="{{ url('video/'.$video->video) }}" type="video/mp4">
                  <object data="{{ $video->video }}" width="470" height="255">
                  </object>
                </video>
              </div>
            </div>
          </div>
        </div>

    </div>
  </div>
@endsection