@extends('template')
@section('title')
	Artikel
@endsection
@section('content')
	<div class="wrepper">
		<div class="row content">
			<div class="left-content">
				<div class="sidebar">
					<h2 class="section-title">Kategori</h2>
					<p><a href="{{ url('/kursus') }}">All</a></p>
					@foreach($kategori as $k)

							<p>
								<a style="color: @if($k->nama_kategori == $anu->nama_kategori) #C57AB1 @endif" href="{{ url('kategori/' . $k->id . '/' . str_slug($k->nama_kategori, '-')) }}">{{ $k->nama_kategori }}</a>
							</p>

					@endforeach
				</div>
			</div>
			<div class="right-content">
				<div class="content">
					<div class="header-content">
						<h4>Pencarian</h4>
						<form method="GET" action="{{ url('search') }}">
							<div class="form-group">
								<div class="input-group">
									<input placeholder="Cari Materi" type="text" class="form-control search" name="q">
									<div class="input-group-append">
										<button class="btn btn-primary" name="submit" type="button"><i class="fa fa-search"></i></button>
									</div>		
								</div>
							</div>
						</form>
						<!-- Mobile Category Responsive -->

						<div class="buttons mobile-category">
							<br>
							<a href="#" class="btn btn-primary">All</a>
                            <?php
                            foreach($kategori as $k) {
                            ?>
							<a href="{{ url('kategori/' . $k->id . '/' . str_slug($k->nama_kategori, '-')) }}">{{ $k->nama_kategori }}<span class="badge badge-transparent">4</span></a>
                            <?php
                            }
                            ?>
						</div>

						<!-- End Mobile Category Responsive -->

						<div class="alert alert-light box-filter">
							<span><a href="{{ url('kursus') }}">All</a></span> |
							<span><a href="{{ url('kursus/berbayar') }}">Berbayar</a></span> | 
							<span><a href="{{ url('kursus/gratis') }}">Gratis</a></span>
							<div class="right-box-filter">
								<div class="card-header-action dropdown">
				                    <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle" aria-expanded="false">Urutkan</a>
				                    <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right" x-placement="top-end" style="position: absolute; transform: translate3d(-125px, -201px, 0px); top: 0px; left: 0px; will-change: transform;">
				                      <li class="dropdown-title">Berdasarkan</li>
				                      <li><a href="{{ url('kursus') }}" class="dropdown-item active">Terbaru</a></li>
				                      <li><a href="{{ url('kursus/popular') }}" class="dropdown-item">Popular</a></li>
				                    </ul>
				                </div>
								{{-- <span>Urutkan :</span>
								<select style="width: auto" class="custom-select" name="" id="">
									<option value="" selected="">Terbaru</option>
									<option value="">Populer</option>
								</select> --}}
							</div>
						</div>
					</div>
					<div class="main-content">

						@foreach($materi as $m)
							<div class="content-item">
								<div class="thumb" style="background-image: url('{{ url('') }}/assets/img/materi/{{ $m->gambar }}')">
									<div class="label label-1">{{ $m->kategori->nama_kategori }}</div>
								</div>
								<div class="desc-item">
									<p><a href="{{ url("materi/" . $m->id . '/' . str_slug($m->nama_materi, '-')) }}">{{ $m->nama_materi }}</a></p>
									<div class="teacher">
										<img @if(empty($m->users->gambar)) src="{{ url('') }}/assets/img/avatar-1.png" @else src="{{ url('') }}/assets/img/user/{{ $m->users->gambar }}" @endif alt="david_naista"> {{ $m->users->name }}
									</div>
									<div class="clearfix"></div>
									<div class="status">
										<div class="left-status">
											<i class="fa fa-heart"></i> {{ $m->love }}
											<i class="fa fa-user"></i> {{ $m->user }}
										</div>
										<div class="right-status">
											<p>@if ($m->harga !== 'FREE')
													Rp. {{ $m->harga }}
												@else
													FREE
												@endif
											</p>
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
@endsection