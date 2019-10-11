@extends('template')
@section('title')
  Artikel
@endsection
@section('content')
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ url('') }}/assets/img/logo.png" alt="logo" width="100" class="shadow-light">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Konfirmasi Pembayaran</h4></div>

              <div class="card-body">
                {{-- <p class="text-muted">Silahkan lakukan pembayaran <br> senilai @if ($beli->materi->harga !== 'FREE') Rp. {{ number_format($beli->materi->harga+($beli->materi->harga*(5/100))) }} @else FREE @endif <br> A/N David Naista <br> No Rek. 238-0939-4770-34 </p> --}}
                <p class="text-muted">Invoice #{{ $beli->invoice }}, 
                  <br>Total  @if ($beli->materi->harga !== 'FREE') Rp. {{ number_format($beli->materi->harga+($beli->materi->harga*(5/100))) }} @else FREE @endif <br> No. Rek <b>238-0939-4770-34</b><br><a href="{{ url('profile/history/'.$beli->invoice) }}" class="badge badge-info">lihat lengkap</a></p>

                <form enctype="multipart/form-data" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="nama">Nama Anda</label>
                    <input id="nama" type="nama" class="form-control" name="nama" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <label for="rekening">Rekening Anda</label>
                    <input id="rekening" type="text" class="form-control" name="rekening" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <label for="date">Tanggal</label>
                    <input id="date" type="date" class="form-control" name="tanggal" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <label for="nama">Bukti Pembayaran</label>
                    <div class="custom-file">
                      <input type="file" name="gambar" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" value="{{ $beli->invoice }}" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Konfirmasi
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection