@extends('template')
@section('title')
  Artikel
@endsection
@section('content')
  <div class="profile-wrepper" style="padding: 0">
    <div class="content">
      <section class="section">

          
          <div class="section-body">
            <div class="row">
              <div class="col-12 mb-4">
                <div class="hero align-items-center bg-primary text-white">
                  <div class="hero-inner text-center">
                    <h2>TERIMA KASIH</h2>
                    <p class="lead">Kamu telah berhasil melakukan pembayaran di system kami.</p>
                    <div class="mt-4">
                      <a href="{{ url('kursus') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fa fa-home"></i> Home</a>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-12 mb-4">
                <div class="card card-primary"> 
                  <div class="card-body text-center">
                    <h4>Terima Kasih atas order Anda. Order Anda akan kami aktifkan secepatnya setelah kami menerima pembayaran Anda.</h4>
                  </div>
                  <div class="card-footer text-center">
                    <p>Jika Anda memiliki pertanyaan lebih lanjut, silahkan  <a href="">chat sekarang</a>  atau telepon kami di 0896-3153-1651</p>
                  </div>
                </div>
              </div>
              
            </div>
          </div>

      </section>
    </div>
  </div>
  @endsection