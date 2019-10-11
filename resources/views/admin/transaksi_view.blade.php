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
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">

              <div class="card-header card-header-primary">
                <h4 class="card-title ">Detail Transaksi</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <td class="text-primary">Nama User</td>
                      <td>{{ $beli->user->name }}</td>
                    </tr>
                    <tr>
                      <td class="text-primary">Materi</td>
                      <td>{{ $beli->materi->nama_materi }}</td>
                    </tr>
                    <tr>
                      <td class="text-primary">Harga</td>
                      <td>@if($beli->materi->harga == 'FREE')
                          FREE
                        @else
                          Rp. {{ number_format($beli->materi->harga) }},-
                        @endif</td>
                    </tr>
                    <tr>
                      <td class="text-primary"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td class="text-primary">Tanggal Order</td>
                      <td>{{ date('D, d M Y', $beli->invoice) }}</td>
                    </tr>
                    <tr>
                      <td class="text-primary">Invoice</td>
                      <td>{{ $beli->invoice }}</td>
                    </tr>
                    <tr>
                      <td class="text-primary"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td class="text-primary">A/N</td>
                      <td>{{ $beli->tr_nama }}</td>
                    </tr>
                    <tr>
                      <td class="text-primary">Rekening</td>
                      <td>{{ $beli->tr_rekening }}</td>
                    </tr>
                    <tr>
                      <td class="text-primary">Tanggal Pembayaran</td>
                      <td>YYYY-MM-DD <br>{{ $beli->tr_tanggal }}</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        <form method="POST">
                          @csrf
                          <?php if ($beli->status == 2) { ?>
                            <button onclick="return confirm('Apakah anda yakin menghapus data ini?')" name="cancel" value="{{ $beli->gambar }}" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></button>
                          <?php }else{ ?>
                            <button name="done" value="{{ $beli->id }}" class="btn btn-sm btn-success"><i class="material-icons">done</i></button>
                            <button onclick="return confirm('Apakah anda yakin menghapus data ini?')" name="cancel" value="{{ $beli->gambar }}" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></button>
                          <?php } ?>
                        </form>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-profile">
            <div class="card-body">
              <div class="card-header card-header-primary">
                <h4 class="card-title text-left">Bukti Pembayaran</h4>
              </div><br>
              <img style="width: 100%;max-width: 530px" @if(empty($beli->gambar))  src="{{ url('/') }}/assets/img/avatar-1.png" @else src="{{ url('') }}/assets/img/payment/{{ $beli->gambar }}" @endif />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection