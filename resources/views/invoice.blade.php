@extends('template')
@section('title')
  Artikel
@endsection
@section('content')
  <div class="profile-wrepper" style="padding: 0">
    <div class="content">
      <section class="section">
        <div class="row">

          <div class="main-content" style="width: 100%">
            <section class="section" style="width: 100%">
              
              <div class="section-header">
                <h1>Invoice</h1>
                <div class="section-header-breadcrumb">
                  <div class="breadcrumb-item active"><a href="{{ url('profile') }}">Profile</a></div>
                  <div class="breadcrumb-item active"><a href="{{ url('profile/history') }}">History</a></div>
                  <div class="breadcrumb-item">Invoice</div>
                </div>
              </div>

              <div class="card card-primary">
                <div class="card-header text-primary">
                  <h4>Cara Pembayaran</h4>
                </div>
                <div class="card-body">
                  <p>Silahkan bayar dengan jumlah sesuai Total di Invoice di bawah, dengan : <br> 
                    - Nomor rekening <b>238-0939-4770-34</b> <br>
                    - A/N <b>David Naista</b> <br>
                    Jika sudah melalukan pembayaran, silahkan pilih <b>Konfirmasi</b>
                  </p>
                </div>
              </div>

              <div class="section-body">
                <div class="invoice">
                  <div class="invoice-print">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="invoice-title">
                          <h2><img width="200" src="{{ url('assets/img/logo.png') }}"></h2>
                          <div class="invoice-number">Order #{{ $beli->invoice }}</div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-md-6">
                            <address>
                              <strong>Billed To:</strong><br>
                                {{ $beli->user->name }}<br>
                            </address>
                          </div>
                          <div class="col-md-6 text-md-right">
                            <address>
                              <strong>Shipped To:</strong><br>
                              David Naista<br>
                              238-0939-4770-34
                            </address>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <address>
                              <strong>Email:</strong><br>
                              {{ $beli->user->email }}
                            </address>
                          </div>
                          <div class="col-md-6 text-md-right">
                            <address>
                              <strong>Order Date:</strong><br>
                              {{ date('D, d M Y', $beli->invoice) }}
                            </address>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row mt-4">
                      <div class="col-md-12">
                        <div class="section-title">Order Summary</div>
                        <p class="section-lead">All items here cannot be deleted.</p>
                        <div class="table-responsive">
                          <table class="table table-striped table-hover table-md">
                            <tr>
                              <th data-width="40">#</th>
                              <th>Item</th>
                              <th class="text-center">Price</th>
                              <th class="text-center">Discount</th>
                              <th class="text-right">Totals</th>
                            </tr>
                            <tr>
                              <td>1</td>
                              <td>{{ $beli->materi->nama_materi }}</td>
                              <td class="text-center"> 
                                @if ($beli->materi->harga !== 'FREE') Rp. {{ number_format($beli->materi->harga) }} @else FREE @endif
                              </td>
                              <td class="text-center">-</td>
                              <td class="text-right">
                                @if ($beli->materi->harga !== 'FREE') Rp. {{ number_format($beli->materi->harga) }} @else FREE @endif
                              </td>
                            </tr>
                          </table>
                        </div>
                        <div class="row mt-4">
                          <div class="col-lg-8">
                            <div class="section-title">Payment Method</div>
                            <p class="section-lead">The payment method that we provide is to make it easier for you to pay invoices.</p>
                            <div class="d-flex">
                              <div class="mr-2 bg-visa" data-width="61" data-height="38"></div>
                              <div class="mr-2 bg-paypal" data-width="61" data-height="38"></div>
                              <div class="mr-2 bg-mastercard" data-width="61" data-height="38"></div>
                              <div class="mr-2 bg-bca" data-width="61" data-height="38"></div>
                            </div>
                          </div>
                          <div class="col-lg-4 text-right">
                            <div class="invoice-detail-item">
                              <div class="invoice-detail-name">Subtotal</div>
                              <div class="invoice-detail-value">@if ($beli->materi->harga !== 'FREE') Rp. {{ number_format($beli->materi->harga) }} @else FREE @endif</div>
                            </div>
                            <div class="invoice-detail-item">
                              <div class="invoice-detail-name">PPN 5%</div>
                              <div class="invoice-detail-value">
                                @if ($beli->materi->harga !== 'FREE') Rp. {{ number_format(($beli->materi->harga*(5/100))) }} @else FREE @endif
                              </div>
                            </div>
                            <hr class="mt-2 mb-2">
                            <div class="invoice-detail-item">
                              <div class="invoice-detail-name">Total</div>
                              <div class="invoice-detail-value invoice-detail-value-lg">
                                @if ($beli->materi->harga !== 'FREE') Rp. {{ number_format($beli->materi->harga+($beli->materi->harga*(5/100))) }} @else FREE @endif
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php 
                    if ($beli->status !== 2) {
                   ?>

                  <hr>
                  <div class="text-md-right">
                    
                      <form method="POST">
                        @csrf
                        <a href="{{ url('profile/history/'.$beli->invoice.'/confirm') }}" class="btn btn-primary btn-icon icon-left"><i class="fa fa-credit-card"></i> Konfirmasi</a>
                        <button class="btn btn-danger btn-icon icon-left" name="cancel" value="{{ $beli->invoice }}"><i class="fa fa-times"></i> Cancel</button>
                      </form>

  <div class="modal hide fade" id="myModal">

      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Selamat!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
            <img src="{{ url('assets/img/ceklist.png') }}" height="100">
            <h5>Anda telah berhasil memesan.</h5>
            <p>Silahkan lanjut ke tahap pembayaran</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
          </div>
        </div>
      </div>

  </div>
                  </div>
                   <?php } ?>
                </div>
              </div>
            </section>
          </div>

        </div>
      </section>
    </div>
  </div>
  
  @if(isset($_GET['m']))
  <script type="text/javascript">
      $(window).on('load',function(){
          $('#myModal').modal('show');
      });
  </script>
  @endif
  
  @endsection