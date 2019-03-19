@extends('template')
@section('title')
  Artikel
@endsection
@section('content')
  <div class="profile-wrepper" style="padding: 0">
    <div class="content">
      <section class="section">
        <div class="section-body">
          <h2 class="section-title">Hi, {{ Auth::user()->name }}!</h2>
          <p class="section-lead">
            Selamat datang di halaman profile kak.
          </p>
          <div class="row">
            <div class="col-lg-4">
              <div class="card profile-widget">
                <div class="profile-widget-header">
                  <img alt="image" @if(empty(Auth::user()->gambar))  src="{{ url('/') }}/assets/img/avatar-1.png" @else src="{{ url('') }}/assets/img/user/{{ Auth::user()->gambar }}" @endif class="rounded-circle profile-widget-picture">
                  <div class="profile-widget-items">
                    <div class="profile-widget-item">
                      <div class="profile-widget-item-label">Materi</div>
                      <div class="profile-widget-item-value">{{ count($materi) }}</div>
                    </div>
                    <div class="profile-widget-item">
                      <div class="profile-widget-item-label">Followers</div>
                      <div class="profile-widget-item-value">2,1K</div>
                    </div>
                  </div>
                </div>
                <div class="profile-widget-description">
                  <div class="profile-widget-name">{{ Auth::user()->name }} <div class="text-muted d-inline font-weight-normal"> @if( !empty(Auth::user()->status)) <div class="slash"></div> {{ Auth::user()->status }} @endif</div></div>
                  {{ Auth::user()->bio }}
                </div>

              </div>
            </div>
            <div class="col-lg-8" style="padding: 0">
              <div class="card">
                <div class="card-body">
                  <ul class="nav nav-tabs" style="height:auto;">
                    <li class="nav-item">
                      <a class="nav-link active" id="materi-tab" data-toggle="tab" href="#materi" role="tab" aria-controls="profile" aria-selected="false" href="#"><i class="fa fa-book">&nbsp;</i>Materi</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="whishlist-tab" data-toggle="tab" href="#whishlist" role="tab" aria-controls="whishlist" aria-selected="false" href="#"><i class="fa fa-bookmark">&nbsp;</i>Bookmark</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="materi" role="tabpanel" aria-labelledby="materi-tab">
                      <div class="wrepper" style="padding: 0;">
                        <div class="row content">
                          <div class="content">
                            <div class="main-content tab-contents">

                              @foreach($materi as $m)
                              <div class="content-item">
                                <div class="thumb" style="background-image: url('{{ url('') }}/assets/img/materi/{{ $m->materi->gambar }}')">
                                  <div class="label btn-primary">{{ $m->materi->kategori->nama_kategori }}</div>
                                </div>
                                <div class="desc-item">
                                  <p><a href="{{ url("materi/" . $m->materi->id . '/' . str_slug($m->materi->nama_materi, '-')) }}">{{ $m->materi->nama_materi }}</a></p>
                                  <div class="teacher">
                                    <img src="assets/img/david_naista.jpg" alt="david_naista"> David Naista
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="status">
                                    <div class="left-status">
                                      <i class="fa fa-heart"></i> {{ $m->materi->love }}
                                      <i class="fa fa-user"></i> {{ $m->materi->user }}
                                    </div>
                                    <div class="right-status">
                                      <p>@if ($m->materi->harga !== 'FREE')
                                          Rp. {{ number_format($m->materi->harga) }}
                                        @else
                                          FREE
                                        @endif</p>
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                              </div>
                              @endforeach


                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="whishlist" role="tabpanel" aria-labelledby="whishlist-tab">
                      <div class="wrepper" style="padding: 0;">
                        <div class="row content">
                          <div class="content">
                            <div class="alert alert-primary alert-dismissible show fade">
                              <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                  <span>&times;</span>
                                </button>
                                Halaman ini berisi materi yang kamu tandai.
                              </div>
                            </div>
                            <div class="main-content tab-contents">

                              @foreach($bookmark as $m)
                                <div class="content-item">
                                  <div class="thumb" style="background-image: url('{{ url('') }}/assets/img/materi/{{ $m->materi->gambar }}')">
                                    <div class="label btn-primary">{{ $m->materi->kategori->nama_kategori }}</div>
                                  </div>
                                  <div class="desc-item">
                                    <p><a href="{{ url("materi/" . $m->materi->id . '/' . str_slug($m->materi->nama_materi, '-')) }}">{{ $m->materi->nama_materi }}</a></p>
                                    <div class="teacher">
                                      <img src="assets/img/david_naista.jpg" alt="david_naista"> David Naista
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="status">
                                      <div class="left-status">
                                        <i class="fa fa-heart"></i> {{ $m->materi->love }}
                                        <i class="fa fa-user"></i> {{ $m->materi->user }}
                                      </div>
                                      <div class="right-status">
                                        <p>@if ($m->materi->harga !== 'FREE')
                                            Rp. {{ number_format($m->materi->harga) }}
                                          @else
                                            FREE
                                          @endif</p>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                              @endforeach

                            </div>
                          </div>
                        </div>
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