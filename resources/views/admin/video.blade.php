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
          <a href="{{ url('admin/video/add') }}" class="btn btn-success"><i class="material-icons">add</i> <b>Tambah Video</b></a>
          <?php if (isset($_GET['q'])) { ?>
          <h3>Total <b>{{ count($video) }}</b> ditemukan, pencarian dari kata <b>"{{ $_GET['q'] }}"</b></h3>
          <?php } ?>
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Data Video</h4>
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
                    Nama Video
                  </th>
                  <th>
                    Materi
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
                      @if(empty($v->materi->nama_materi)) <i>Materi tidak ditemukan</i> @else {{ $v->materi->nama_materi }} @endif
                    </td>
                    <td>
                      <?php if ($v->dilihat == "") {
                        ?>
                      0
                      <?php }else{ ?>
                      {{ $v->dilihat }}
                      <?php } ?>
                    </td>
                    <td class="text-primary">
                      <a href="{{ url('/admin/video/edit/'.$v->id.'/'.str_slug($v->nama_video,'-')) }}" class="btn btn-sm btn-primary"><i class="material-icons">edit</i></a>
                      <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="{{ url('/admin/video/del/'.$v->id.'/'.str_slug($v->nama_video,'-')) }}" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a>
                      <a href="{{ url('/admin/video/view/'.$v->id.'/'.str_slug($v->nama_video,'-')) }}" class="btn btn-sm btn-success"><i class="material-icons">visibility</i></a>
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
      {{ $video->links() }}
      <?php } ?>
    </div>
  </div>
@endsection