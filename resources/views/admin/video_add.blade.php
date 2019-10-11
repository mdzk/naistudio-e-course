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
      @if(isset($video))
        <div class="row">
          <div class="col-md-8">
            <div class="card card-profile">
              <div class="card-body">
                <img style="width: 100%;max-width: 530px" @if(empty($video->thumbnail))  src="{{ url('/') }}/assets/img/no-img.jpg" @else src="{{ url('') }}/video/{{ $video->thumbnail }}" @endif />
              </div>
            </div>
          </div>
        </div>
      @endif
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">@if(isset($video)) Edit Materi @else Tambah Video @endif</h4>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <label>Thumbnail</label>
                    <div class="form-group">
                      <label></label>
                      <input type="file" name="thumbnail" class="form-control" accept="image/gif, image/jpg, image/jpeg, image/png">
                    </div>
                  </div>
                </div>
                <div class="row" style="margin-top: 10px">
                  <div class="col-md-12">
                    <label>Video</label>
                    <div class="form-group">
                      <label></label>
                      <input type="file" name="video" class="form-control" accept="video/mp4,video/x-m4v,video/*">
                    </div>
                  </div>
                </div>
                <div class="row" style="margin-top: 10px">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nama Video</label>
                      <input type="text" class="form-control" name="nama_video" @if(isset($video)) value="{{ $video->nama_video }}" @endif>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <select name="id_materi" class="form-control">
                        <option value="" disabled selected hidden>-- Pilih Materi --</option>
                        @foreach($materi as $m )
                          <option @if(isset($video)) @if($m->id == $video->id_materi) selected @endif @endif value="{{ $m->id }}">{{ $m->nama_materi }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <div class="form-group">
                        <textarea class="form-control" id="deskripsi" rows="5" name="deskripsi">@if(isset($video)) {{ $video->deskripsi }} @endif</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection