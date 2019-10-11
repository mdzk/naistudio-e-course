@extends('template')
@section('title')
  Artikel
@endsection
@section('content')
  <div class="profile-wrepper" style="padding: 0">
    <div class="content">
      <section class="section">
        <div class="row">

          <div class="col-lg-12" style="padding: 0">

            <div class="alert alert-primary alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>&times;</span>
                </button>
                Halaman ini berisi daftar riwayat transaksi kakak.
              </div>
            </div>

            <div class="section-header">
              <h1>History</h1>
              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Profile</a></div>
                <div class="breadcrumb-item">History</div>
              </div>
            </div>

            <div class="section-body">
              <h2 class="section-title">Hi, {{ Auth::user()->name }}!</h2>
              <p class="section-lead">
                Selamat datang di halaman invoice kak.
              </p>
            </div>
            <div class="card">
              <div class="card-body">
                <ul class="nav nav-tabs" style="height:auto;">
                  <li class="nav-item">
                    <a class="nav-link active" id="materi-tab" data-toggle="tab" href="#materi" role="tab" aria-controls="profile" aria-selected="false" href="#">Unpaid</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="whishlist-tab" data-toggle="tab" href="#whishlist" role="tab" aria-controls="whishlist" aria-selected="false" href="#">Paid</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="materi" role="tabpanel" aria-labelledby="materi-tab">
                    <div class="wrepper" style="padding: 0;">

                            <div class="card-body p-0">
                              <div class="table-responsive">
                                <table class="table table-hover table-md">
                                  <tr>
                                    <th>#</th>
                                    <th>Materi</th>
                                    <th>Invoice</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                  </tr>

                                  <?php 
                                    $i = 1;
                                    foreach ($unpaid as $b) {
                                   ?>

                                  <tr>
                                    <td><?= $i++; ?></td>
                                    <td>{{ $b->materi->nama_materi }}</td>
                                    <td>#{{ $b->invoice }}</td>
                                    <td>{{ $b->tanggal }}</td>
                                    <td><b>@if ($b->materi->harga !== 'FREE') Rp. {{ number_format($b->materi->harga) }} @else FREE @endif</b></td>
                                    <td>
                                      <a href="{{ url('profile/history/'.$b->invoice) }}" class="btn btn-success">View</a>
                                      <?php if (empty($b->tr_nama)) { ?>
                                      <a href="{{ url('profile/history/'.$b->invoice.'/confirm') }}" class="btn btn-primary">Confirm</a>
                                      <?php } else { ?>
                                      <button name="buy" class="btn btn-warning" disabled>Sedang diproses</button>
                                      <?php } ?>
                                    </td>
                                  </tr>

                                  <?php } ?>

                                </table>
                              </div>
                            </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="whishlist" role="tabpanel" aria-labelledby="whishlist-tab">
                    <div class="wrepper" style="padding: 0;">
                      
                      <div class="card-body p-0">
                        <div class="table-responsive">
                          <table class="table table-hover table-md">
                            <tr>
                              <th>#</th>
                              <th>Materi</th>
                              <th>Invoice</th>
                              <th>Tanggal</th>
                              <th>Total</th>
                              <th>Action</th>
                            </tr>

                            <?php 
                              $i = 1;
                              foreach ($paid as $b) {
                             ?>

                            <tr>
                              <td><?= $i++; ?></td>
                              <td>{{ $b->materi->nama_materi }}</td>
                              <td>#{{ $b->invoice }}</td>
                              <td>{{ $b->tanggal }}</td>
                              <td><b>@if ($b->materi->harga !== 'FREE') Rp. {{ number_format($b->materi->harga) }} @else FREE @endif</b></td>
                              <td>
                                <a href="{{ url('profile/history/'.$b->invoice) }}" class="btn btn-warning">View</a>
                              </td>
                            </tr>

                            <?php } ?>

                          </table>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  @endsection