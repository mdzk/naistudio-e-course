@extends('admin.template')
@section('nav')
  <li class="nav-item   ">
    <a class="nav-link" href="{{ url('admin') }}">
      <i class="material-icons">dashboard</i>
      <p>Dashboard</p>
    </a>
  </li>
  <li class="nav-item ">
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
  <li class="nav-item active ">
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
        <div class="col-md-6">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Data Kategori</h4>
              {{--<p class="card-category"> </p>--}}
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                  <th>
                    #
                  </th>
                  <th>
                    Nama Kategori
                  </th>
                  <th>
                    Action
                  </th>
                  </thead>
                  <tbody>

                  <?php $i=1; foreach ($kategori as $k) { ?>
                  <tr>
                    <td>
                      {{ $i++ }}
                    </td>
                    <td>
                      {{ $k->nama_kategori }}
                    </td>
                    <td class="text-primary">
                      <a href="{{ url('admin/kategori/edit/' . $k->id . '/' .str_slug($k->nama_kategori, '-')) }}" class="btn btn-sm btn-primary"><i class="material-icons">edit</i></a>
                      <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="{{ url('admin/kategori/del/' . $k->id . '/' .str_slug($k->nama_kategori, '-')) }}" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">
                @if(isset($kat))
                  Edit Kategori
                  @else
                  Tambah Kategori
                  @endif
              </h4>
            </div>
            <div class="card-body">
              <form method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nama Kategori</label>
                      <input type="text" name="nama_kategori" class="form-control" @if(isset($kat)) value="{{ $kat->nama_kategori }}" @endif>
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