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
      <div class="row">
        <div class="col-md-4">
          <div class="card card-profile">
            <div class="card-body">
              <img style="width: 100%;max-width: 530px" @if(empty($materi->gambar))  src="{{ url('/') }}/assets/img/avatar-1.png" @else src="{{ url('') }}/assets/img/materi/{{ $materi->gambar }}" @endif />
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">

              <div class="card-header card-header-primary">
                <h4 class="card-title ">Materi</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <td class="text-primary">Materi</td>
                      <td>{{ $materi->nama_materi }}</td>
                    </tr>
                    <tr>
                      <td class="text-primary">Kategori</td>
                      <td>{{ $materi->kategori->nama_kategori }}</td>
                    </tr>
                    <tr>
                      <td class="text-primary">Harga</td>
                      <td>@if($materi->harga == 'FREE')
                          FREE
                        @else
                          Rp. {{ number_format($materi->harga) }},-
                        @endif</td>
                    </tr>
                    <tr>
                      <td class="text-primary">Deskripsi</td>
                      <td>{{ $materi->deskripsi }}</td>
                    </tr>
                    <tr>
                      <td class="text-primary">Dibeli</td>
                      <td>{{ count($beli) }}</td>
                    </tr>
                  </table>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Video</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                  <th>
                    #
                  </th>
                  <th>
                    Nama Video
                  </th>
                  <th>
                    Deskripsi
                  </th>
                  <th>
                    View
                  </th>
                  <th>
                    Action
                  </th>
                  </thead>
                  <tbody>

                  <?php $i=1; foreach ($video as $v) { ?>
                  <tr>
                    <td>
                      {{ $i++ }}
                    </td>
                    <td>
                      {{ $v->nama_video }}
                    </td>
                    <td>
                      {!! substr(trim(strip_tags($v->deskripsi)), 0,30) !!}...
                    </td>
                    <td>
                      {{ $v->dilihat }}
                    </td>
                    <td class="text-primary">
                      <form method="POST">
                        @csrf
                        <a href="{{ url('admin/video/edit/'.$v->id.'/'.str_slug($v->nama_video,'-')) }}" name="edit" class="btn btn-sm btn-primary"><i class="material-icons">edit</i></a>
                        <a href="{{ url('admin/video/del/'.$v->id.'/'.str_slug($v->nama_video,'-')) }}" name="delete" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a>
                        <a href="{{ url('admin/video/view/'.$v->id.'/'.str_slug($v->nama_video,'-')) }}" name="view" class="btn btn-sm btn-success"><i class="material-icons">visibility</i></a>
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
@endsection