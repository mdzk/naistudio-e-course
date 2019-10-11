@extends('admin.template')
@section('nav')
  <li class="nav-item active">
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
      
      <h3>Total <b>{{ count($materi)+count($video)+count($user) }}</b> ditemukan, pencarian dari kata <b>"{{ $_GET['q'] }}"</b></h3>

      <?php 
        if (count($materi) !== 0) {
       ?>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-success">
                <h4 class="card-title float-left">Materi</h4><a href="{{ url('admin/search/materi?q='.$_GET['q']) }}" class="float-right btn btn-sm btn-primary">More</a>
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
                          <button value="{{ $m->id }}" name="view" class="btn btn-sm btn-info"><i class="material-icons">video_call</i></button>
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
      <?php } ?>
      
      <?php 
        if (count($video) !== 0) {
       ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-danger">
              <h4 class="card-title float-left">Video</h4><a href="{{ url('admin/search/video?q='.$_GET['q']) }}" class="float-right btn btn-sm btn-success">More</a>
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
                      <?php 
                        if ($v->dilihat == "") {
                          ?>
                          0
                      <?php }else { ?> 
                      {{ $v->dilihat }}
                      <?php } ?>
                    </td>
                    <td class="text-primary">
                      <a href="{{ url('/admin/video/edit/'.$v->id.'/'.str_slug($v->nama_video,'-')) }}" class="btn btn-sm btn-primary"><i class="material-icons">edit</i></a>
                      <a href="{{ url('/admin/video/del/'.$v->id.'/'.str_slug($v->nama_video,'-')) }}" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a>
                      <a href="" class="btn btn-sm btn-success"><i class="material-icons">visibility</i></a>
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
      <?php } ?>
      
      <?php 
        if (count($user) !== 0) {
       ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title float-left">User</h4><a href="{{ url('admin/search/user?q='.$_GET['q']) }}" class="float-right btn btn-sm btn-success">More</a>
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
                    Name
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Materi
                  </th>
                  <th>
                    Action
                  </th>
                  </thead>
                  <tbody>

                  <?php $i=1; foreach ($user as $u) { ?>
                  <tr>
                    <td>
                      {{ $i++ }}
                    </td>
                    <td>
                      {{ $u->name }}
                    </td>
                    <td>
                      {{ $u->email }}
                    </td>
                    <td>
                        10
                    </td>
                    <td class="text-primary">
                      <form method="POST">
                        @csrf
                        <a href="{{ url('admin/user/edit/'.$u->id.'/'.str_slug($u->name,'-')) }}" name="edit" class="btn btn-sm btn-primary"><i class="material-icons">edit</i></a>
                        <button value="{{ $u->id }}" name="remove" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></button>
                        <a href="{{ url('admin/user/'.$u->id.'/'.str_slug($u->name,'-')) }}" name="edit" class="btn btn-sm btn-success"><i class="material-icons">visibility</i></a>
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
      <?php } ?>

    </div>
  </div>
@endsection