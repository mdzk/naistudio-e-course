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
        <div class="col-md-12">
          <a href="{{ url('admin/user/add') }}" class="btn btn-success"><i class="material-icons">add</i> <b>Tambah User</b></a>
          <?php if (isset($_GET['q'])) { ?>
          <h3>Total <b>{{ count($user) }}</b> ditemukan, pencarian dari kata <b>"{{ $_GET['q'] }}"</b></h3>
          <?php } ?>
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Data User</h4>
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
                        <button value="{{ $u->id }}" onclick="return confirm('Apakah anda yakin menghapus data ini?')" name="remove" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></button>
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
      <?php if (!isset($_GET['q'])) { ?>
      {{ $user->links() }}
      <?php } ?>
    </div>
  </div>
@endsection