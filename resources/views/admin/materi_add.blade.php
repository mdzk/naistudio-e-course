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
  <li class="nav-item active ">
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
  <li class="nav-item ">
    <a class="nav-link" href="{{ url('admin/setting') }}">
      <i class="material-icons">settings</i>
      <p>Pengaturan</p>
    </a>
  </li>
@endsection
@section('content')
      <div class="content">
        <div class="container-fluid">
          @if(isset($materi))
          <div class="row">
            <div class="col-md-8">
              <div class="card card-profile">
                <div class="card-body">
                  <img style="width: 100%;max-width: 530px" @if(empty($materi->gambar))  src="{{ url('/') }}/assets/img/avatar-1.png" @else src="{{ url('') }}/assets/img/materi/{{ $materi->gambar }}" @endif />
                </div>
              </div>
            </div>
          </div>
          @endif
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">@if(isset($materi)) Edit Materi @else Tambah Materi @endif</h4>
                </div>
                <div class="card-body">
                  <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <label>Thumbnail</label>
                        <div class="form-group">
                          <label></label>
                          <input type="file" name="gambar" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Materi *</label>
                          <input type="text" class="form-control" name="nama_materi" @if(isset($materi)) value="{{ $materi->nama_materi }}" @endif>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <select name="id_kategori" class="form-control">
                            <option value="" disabled selected hidden>-- Select Category --</option>
                          @foreach($kategori as $k )
                            <option @if(isset($materi)) @if($k->id == $materi->id_kategori) selected @endif @endif value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <label class="bmd-label-floating text-danger">Contoh: 9000, Kosongkan jika tidak ada harga *</label>
                        <div class="form-group">
                          <label class="bmd-label-floating">Harga *</label>
                          <input type="text" class="form-control" name="harga" @if(isset($materi)) value="{{ $materi->harga }}" @endif>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="deskripsi">Deskripsi *</label>
                          <div class="form-group">
                            <textarea class="form-control" id="deskripsi" rows="5" name="deskripsi">@if(isset($materi)) {{ $materi->deskripsi }} @endif</textarea>
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