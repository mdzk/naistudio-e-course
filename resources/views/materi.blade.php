@extends('template')
@section('title')
  Artikel
@endsection
@section('content')
<div class="wrepper" style="padding: 0">
  <div class="content">
    <section class="section">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="hero bg-color text-white">
            <div class="hero-inner">
              <h2>{{ $materi->nama_materi }}</h2>
              <p class="lead">
                {{ $materi->deskripsi }}
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <article class="article article-style-c">
            <div class="article-header" id="thumd-playlist">
              <div class="article-image" style="background-image:url('{{ url('') }}/assets/img/materi/{{ $materi->gambar }}');">
              </div>
              <div class="article-badge">
                <div class="article-badge-item bg-warning"></i>{{ $materi->kategori->nama_kategori }}</div>
              </div>
            </div>
            <div class="article-details">
              <div class="article-category"><a href="#">Price</a></div>
              <div class="article-title">
                <h2 class="mb-4 text-primary">@if ($materi->harga !== 'FREE') Rp. {{ number_format($materi->harga) }} @else FREE @endif</h2>
              </div>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active"><i class="fa fa-play"></i> {{ count($video) }} Video Materi</li>
                  <li class="breadcrumb-item active"><i class="fa fa-clock-o"></i> 289 Menit</li>
                </ol>
              </nav>
              <div class="article-cta">

                <form method="POST">
                  @csrf
                  @if(Auth::user())
                    @if( count($tandai)>0 && count($beli)>0)
                      <button name="buy" value="{{ $materi->id }}" class="btn btn-lg btn-block btn-secondary" disabled>Terbeli</button>
                      <button name="remove" value="{{ $materi->id }}" class="btn btn-lg btn-block btn-danger">
                        <i class="fa fa-bookmark mr-2"></i>Hapus Tanda
                      </button>
                    @elseif( count($beli)>0 )
                      <button name="buy" value="{{ $materi->id }}" class="btn btn-lg btn-block btn-secondary" disabled>Terbeli</button>
                      <button name="bookmark" value="{{ $materi->id }}" class="btn btn-lg btn-block btn-outline-danger">
                        <i class="fa fa-bookmark mr-2"></i>Tandai
                      </button>
                    @elseif( count($tandai)>0 )
                      <button name="buy" value="{{ $materi->id }}" class="btn btn-lg btn-block btn-primary">Beli Sekarang</button>
                      <button name="remove" value="{{ $materi->id }}" class="btn btn-lg btn-block btn-danger">
                        <i class="fa fa-bookmark mr-2"></i>Hapus Tanda
                      </button>
                    @else
                      <button name="buy" value="{{ $materi->id }}" class="btn btn-lg btn-block btn-primary">Beli Sekarang</button>
                      <button name="bookmark" value="{{ $materi->id }}" class="btn btn-lg btn-block btn-outline-danger">
                        <i class="fa fa-bookmark mr-2"></i>Tandai
                      </button>
                    @endif
                  @else
                    <a href="{{ url('login') }}" class="btn btn-lg btn-block btn-primary">Beli Sekarang</a>
                    <a href="{{ url('login') }}" class="btn btn-lg btn-block btn-outline-danger">Beli Nanti</a>
                  @endif

                <!-- Button trigger modal -->
                    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">--}}
                        {{--Launch demo modal--}}
                    {{--</button>--}}

                    <!-- Modal -->
                    {{--<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
                        {{--<div class="modal-dialog modal-dialog-centered" role="document">--}}
                            {{--<div class="modal-content">--}}
                                {{--<div class="modal-header">--}}
                                    {{--<h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>--}}
                                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                        {{--<span aria-hidden="true">&times;</span>--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                                {{--<div class="modal-body">--}}
                                    {{--...--}}
                                {{--</div>--}}
                                {{--<div class="modal-footer">--}}
                                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                </form>

              </div>
              <div class="mb-4 mt-4">
                <h4>
                  <span class="badge badge-secondary"><i class="fa fa-heart mr-1"></i>{{ $materi->love }}</span>
                  <span class="badge badge-secondary"><i class="fa fa-user mr-1"></i>{{ $materi->user }}</span>
                </h4>
              </div>

              <div class="article-user">
                <img alt="image" src="{{ url('') }}/assets/img/david_naista.jpg">
                <div class="article-user-details">
                  <div class="user-detail-name">
                    <a href="#">David Naista</a>
                  </div>
                  <div class="text-job">Web Developer</div>
                </div>
              </div>
            </div>
          </article>
        </div>

        <div class="col-lg-8">
          <div class="card">
            <div class="card-header">
              <h4>Playlist</h4>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table">

                  @foreach($video as $v)

                  <tr>
                    @if(Auth::user())
                      <td>
                        @if(count($beli)>0)
                          <a href="{{ url('materi/'. $materi->id .'/' . str_slug($materi->nama_materi, '-') .'/video/'. $v->id . '/' . str_slug($v->nama_video, '-')) }}">{{ $v->nama_video }}</a>
                        @else
                          <p>{{ $v->nama_video }}</p>
                        @endif
                      </td>
                    @else
                      <td><a href="{{ url('login') }}">{{ $v->nama_video }}</a></td>
                    @endif
                    <td><div class="badge badge-primary">Berbayar</div></td>
                    <td><i class="fa fa-clock-o">&nbsp;&nbsp;</i>08:00</td>
                    <td>
                      @if(Auth::user())
                        @if(count($beli)>0)
                          <a href="{{ url('materi/'. $materi->id .'/' . str_slug($materi->nama_materi, '-') .'/video/'. $v->id . '/' . str_slug($v->nama_video, '-')) }}" class="btn btn-primary">
                            <i class="fa fa-play">&nbsp;&nbsp;</i>Watch
                          </a>
                        @else
                          <button class="btn btn-secondary" disabled="">
                            <i class="fa fa-play">&nbsp;&nbsp;</i>Watch
                          </button>
                        @endif
                      @else
                        <button href="{{ url('vidio') }}" class="btn btn-primary" disabled>
                          <i class="fa fa-play">&nbsp;&nbsp;</i>Watch
                        </button>
                      @endif
                    </td>
                  </tr>

                  @endforeach

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  </div>
</div>
@endsection