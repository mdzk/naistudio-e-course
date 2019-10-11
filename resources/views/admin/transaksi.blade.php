@extends('admin.template')
@section('nav')
  <li class="nav-item   ">
    <a class="nav-link" href="{{ url('admin') }}">
      <i class="material-icons">dashboard</i>
      <p>Dashboard</p>
    </a>
  </li>
  <li class="nav-item active ">
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
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Data Masuk</h4>
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
                    Nama Materi
                  </th>
                  <th>
                    User
                  </th>
                  <th>
                    Tanggal
                  </th>
                  <th>
                    Harga
                  </th>
                  <th>
                    Action
                  </th>
                  </thead>
                  <tbody>

                  <?php $i=1; foreach ($notification as $n) { ?>
                  
                  <?php 
                    if (!empty($n->tr_nama)) {
                   ?>

                  <tr>
                    <td>
                      {{ $i++ }}
                    </td>
                    <td>
                      @if(empty($n->materi->nama_materi)) <i>Materi tidak ditemukan</i> @else {{ $n->materi->nama_materi }} @endif
                    </td>
                    <td>
                      @if(empty($n->user->name)) <i>User tidak ditemukan</i> @else {{ $n->user->name }} @endif
                    </td>
                    <td>
                      {{ $n->tanggal }}
                    </td>
                    <td>
                      @if(empty($n->materi->harga)) <i>Harga tidak ditemukan</i> @else
                        @if($n->materi->harga == 'FREE')
                          FREE
                          @else
                          Rp. {{ number_format($n->materi->harga) }},-
                        @endif
                      @endif
                    </td>
                    <td class="text-primary">
                      <form method="POST">
                        @csrf
                        <a href="{{ url('admin/transaksi/'.$n->invoice) }}" class="btn btn-sm btn-success"><i class="material-icons">visibility</i></a>
                        {{-- <button name="done" value="{{ $n->id }}" class="btn btn-sm btn-success"><i class="material-icons">done</i></button>
                        <button name="cancel" onclick="return confirm('Apakah anda yakin menghapus data ini?')" value="{{ $n->id }}" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></button>
                        <button name="cancel" value="{{ $n->id }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></button> --}}
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
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">History</h4>
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
                    Nama Materi
                  </th>
                  <th>
                    User
                  </th>
                  <th>
                    Tanggal
                  </th>
                  <th>
                    Harga
                  </th>
                  {{-- <th>
                    Status
                  </th> --}}
                  <th>
                    Action
                  </th>
                  </thead>
                  <tbody>

                  <?php $i=1; foreach ($history as $n) { ?>
                  <tr>
                    <td>
                      {{ $i++ }}
                    </td>
                    <td>
                      @if(empty($n->materi->nama_materi)) <i>Materi tidak ditemukan</i> @else {{ $n->materi->nama_materi }} @endif
                    </td>
                    <td>
                      @if(empty($n->user->name)) <i>User tidak ditemukan</i> @else {{ $n->user->name }} @endif
                    </td>
                    <td>
                      {{ $n->tanggal }}
                    </td>
                    <td>
                      @if(empty($n->materi->harga)) <i>Harga tidak ditemukan</i> @else
                        @if($n->materi->harga == 'FREE')
                          FREE
                        @else
                          Rp. {{ number_format($n->materi->harga) }},-
                        @endif
                      @endif
                    </td>
                    {{-- <td>
                      @if($n->status == 1)
                      <i>Unpaid</i>
                      @else
                      Paid
                      @endif
                    </td> --}}
                    <td class="text-primary">
                      <form method="POST">
                        @csrf
                        <a href="{{ url('admin/transaksi/'.$n->invoice) }}" class="btn btn-sm btn-success"><i class="material-icons">visibility</i></a>
                        {{-- <button name="cancel" value="{{ $n->id }}" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></button> --}}
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
        {{ $history->links() }}
      </div>
    </div>
  </div>
@endsection