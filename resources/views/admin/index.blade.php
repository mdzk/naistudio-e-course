@extends('admin.template')
@section('nav')
  <li class="nav-item  active ">
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
  <li class="nav-item ">
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
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">person</i>
                  </div>
                  <p class="card-category">User</p>
                  <h3 class="card-title">{{ count($user) }}
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">add</i>
                    <a href="{{ url('/admin/user/add') }}">Tambah User</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">book</i>
                  </div>
                  <p class="card-category">Materi</p>
                  <h3 class="card-title">{{ count($materi) }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">add</i>
                    <a href="{{ url('/admin/materi/add') }}">Tambah Materi</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">play_arrow</i>
                  </div>
                  <p class="card-category">Video</p>
                  <h3 class="card-title">{{ count($video) }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">add</i>
                    <a href="{{ url('/admin/video/add') }}">Tambah Video</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">attach_money</i>
                  </div>
                  <p class="card-category">Terjual</p>
                  <h3 class="card-title">{{ count($saldo) }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">visibility</i>
                    <a href="{{ url('/admin/transaksi') }}">View More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">User Terbaru</h4>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($user as $u) {?>
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                          <a href="{{ url('admin/user/'.$u->id.'/'.str_slug($u->name,'-')) }}" class="btn btn-sm btn-success"><i class="material-icons">visibility</i></a>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">New Order</h4>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-primary">
                    <th>#</th>
                    <th>Name</th>
                    <th>Materi</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($beli as $b) {?>
                        
                      <?php if (!empty($b->tr_nama)) { ?>

                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>@if(empty($b->user->name)) <i>User tidak ditemukan</i> @else {{ $b->user->name }} @endif</td>
                        <td>@if(empty($b->materi->nama_materi)) <i>Materi tidak ditemukan</i> @else {{ $b->materi->nama_materi }} @endif</td>
                        <td>
                          <form method="POST">
                            @csrf
                            <a href="{{ url('admin/transaksi/'.$b->invoice) }}" class="btn btn-sm btn-success"><i class="material-icons">visibility</i></a>
                            {{-- <button name="done" value="{{ $b->id }}" class="btn btn-sm btn-success"><i class="material-icons">done</i></button> --}}
                            {{-- <button onclick="return confirm('Apakah anda yakin menghapus data ini?')" name="cancel" value="{{ $b->id }}" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></button> --}}
                          </form>
                        </td>
                      </tr>

                      <?php } ?>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
@endsection