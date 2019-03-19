@extends('template')
@section('title')
  Belajar PHP Dasar
@endsection
@section('content')
<div class="wrepper" style="padding: 0">
  <div class="content">

    <section class="section">
      <div class="row">
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
          <div class="article article-style-c">
            <div class="article-details">

              <video width="100%" height="auto" poster="{{ url('video/'.$video->thumbnail) }}" controls autoplay>
                <source src="{{ url('video/'.$video->video) }}" type="video/mp4">
                <object data="{{ $video->video }}" width="470" height="255">
                </object>
              </video>

              <div class="article-title">
                <h4 class="text-primary mt-4 mb-4">{{ $video->nama_video }}</h4>
              </div>

              <div class="article-user mb-4">
                <img alt="image" src="{{ url('') }}/assets/img/david_naista.jpg">
                <div class="article-user-details">
                  <div class="user-detail-name">
                    <a href="#">David Naista</a>
                  </div>
                  <div class="text-job">Web Developer</div>
                </div>
              </div>

              <p>{{ $video->deskripsi }}</p>

            </div>

          </div>
        </div>

        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Playlist</h4>
            </div>
            <div class="card-body">
              <ul class="list-unstyled list-unstyled-border">

                <?php $i=1; foreach($playlist as $p){?>
                <li class="media">
                  <span class="mr-2">{{ $i++ }}</span>
                  <img class="mr-3 " height="50" ="50" src="{{ url('video/'.$p->thumbnail) }}" alt="avatar">
                  <div class="media-body">
                    <div class="media-title">
                      <a href="{{ url('materi/' . $p->id_materi . '/' . str_slug($p->materi->nama_materi, '-')) . '/video/' . $p->id . '/' . str_slug($p->nama_video, '-') }}">{{ $p->nama_video }}
                      </a>
                    </div>
                    <span class="text-small text-muted">{{ substr($p->deskripsi, 0,25) }} ...</span>
                  </div>
                </li>
                <?php } ?>

              </ul>
              <div class="text-center pt-1 pb-1">
                <a href="#" class="btn btn-primary btn-lg btn-round">
                  View All
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
</div>
@endsection