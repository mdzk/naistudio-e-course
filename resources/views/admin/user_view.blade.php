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
  <li class="nav-item active ">
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
        <div class="col-md-4">
          <div class="card card-profile">
            <div class="card-avatar">
              <a href="#pablo">
                <img class="img" @if(empty($user->gambar))  src="{{ url('/') }}/assets/img/avatar-1.png" @else src="{{ url('') }}/assets/img/user/{{ $user->gambar }}" @endif />
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-gray">{{ $user->status }}</h6>
              <h4 class="card-title">{{ $user->name }}</h4>
              <p class="card-description">
                {{ $user->bio }}
              </p>
              <hr>
              <p>
                {{ $user->email }}
              </p>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <p><b>Materi</b></p>
                  {{ count($materi) }}
                </div>
                <div class="col-md-6">
                  <p><b>Bookmark</b></p>
                  {{ count($bookmark) }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#profile" data-toggle="tab">
                        <i class="material-icons">book</i> Materi
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#messages" data-toggle="tab">
                        <i class="material-icons">bookmark</i> Bookmark
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                      #
                    </th>
                    <th>
                      Nama Materi
                    </th>
                    <th>
                      Tanggal
                    </th>
                    <th>
                      Status
                    </th>
                    <th>
                      Harga
                    </th>
                    <th>
                      Action
                    </th>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($materi as $n) { ?>
                    <tr>
                      <td>
                        {{ $i++ }}
                      </td>
                      <td>
                        {{ $n->materi->nama_materi }}
                      </td>
                      <td>
                        {{ $n->tanggal }}
                      </td>
                      <td>
                        @if($n->status == 2)
                          <b class="text-success">Terbeli</b>
                        @else
                          <b class="text-warning">Menunggu</b>
                        @endif
                      </td>
                      <td>
                        @if($n->materi->harga == 'FREE')
                          FREE
                        @else
                          Rp. {{ number_format($n->materi->harga) }},-
                        @endif
                      </td>
                      <td class="text-primary">
                        <form method="POST">
                          @csrf
                          @if($n->status == 2)
                            <button name="cancel" rel="tooltip" title="Delete" value="{{ $n->id }}" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></button>
                          @else
                            <button name="done" rel="tooltip" title="Approve" value="{{ $n->id }}" class="btn btn-sm btn-success"><i class="material-icons">done</i></button>
                            <button name="cancel" onclick="return confirm('Apakah anda yakin menghapus data ini?')" rel="tooltip" title="Delete" value="{{ $n->id }}" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></button>
                          @endif
                        </form>
                      </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="messages">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                      #
                    </th>
                    <th>
                      Nama Materi
                    </th>
                    <th>
                      Harga
                    </th>
                    <th>
                      Action
                    </th>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($bookmark as $b) { ?>
                    <tr>
                      <td>
                        {{ $i++ }}
                      </td>
                      <td>
                        {{ $b->materi->nama_materi }}
                      </td>
                      <td>
                        @if($b->materi->harga == 'FREE')
                          FREE
                        @else
                          Rp. {{ number_format($b->materi->harga) }},-
                        @endif
                      </td>
                      <td class="text-primary">
                        <form method="POST">
                          @csrf
                            <button name="cancelb" onclick="return confirm('Apakah anda yakin menghapus data ini?')" rel="tooltip" title="Delete" value="{{ $b->id }}" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></button>
                        </form>
                      </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection