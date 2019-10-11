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
      <div class="row">\
        <div class="col-md-12">
          <a href="{{ url('admin/materi/add') }}" class="btn btn-success"><i class="material-icons">add</i> <b>Tambah Materi</b></a>
          <?php if (isset($_GET['q'])) { ?>
          <h3>Total <b>{{ count($materi) }}</b> ditemukan, pencarian dari kata <b>"{{ $_GET['q'] }}"</b></h3>
          <?php } ?>
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Data Materi</h4>
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
                    Kategori
                  </th>
                  <th>
                    Harga
                  </th>
                  <th>
                    Action
                  </th>
                  </thead>
                  <tbody>

                  <?php $i=1; foreach ($materi as $m) { ?>
                  <tr>
                    <td>
                      {{ $i++ }}
                    </td>
                    <td>
                      {{ $m->nama_materi }}
                    </td>
                    <td>
                      @if(empty($m->kategori->nama_kategori))
                        <i>Tanpa Kategori</i>
                        @else
                        {{ $m->kategori->nama_kategori }}
                        @endif
                    </td>
                    <td>
                      @if($m->harga == 'FREE')
                        FREE
                        @else
                        Rp. {{ number_format($m->harga) }},-
                      @endif
                    </td>
                    <td class="text-primary">
                      <form method="POST">
                        @csrf
                        <a href="{{ url('admin/materi/edit/'.$m->id.'/'.str_slug($m->nama_materi,'-')) }}" name="edit" class="btn btn-sm btn-primary"><i class="material-icons">edit</i></a>
                        <a href="{{ url('admin/materi/del/'.$m->id.'/'.str_slug($m->nama_materi,'-')) }}" onclick="return confirm('Apakah anda yakin menghapus data ini?')" value="{{ $m->id }}" name="delete" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a>
                        <a href="{{ url('admin/materi/view/'.$m->id.'/'.str_slug($m->nama_materi,'-')) }}" name="view" class="btn btn-sm btn-success"><i class="material-icons">visibility</i></a>
                        <a href="{{ url('admin/video/add/'.$m->id.'/'.str_slug($m->nama_materi,'-')) }}" name="view" class="btn btn-sm btn-info"><i class="material-icons">video_call</i></a>
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
      <?php if (!isset($_GET['q'])) { ?>
      {{ $materi->links() }}
      <?php } ?>
    </div>
  </div>
@endsection