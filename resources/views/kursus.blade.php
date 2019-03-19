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
				<p>All</p>
				@foreach($kategori as $k)
				<p><a href="{{ url('kategori/' . $k->id . '/' . str_slug($k->nama_kategori, '-')) }}">{{ $k->nama_kategori }}</a></p>
				@endforeach
			</div>
		</div>
		<div class="right-content">
			<div class="content">
				<div class="header-content">
					<h4>Pencarian</h4>
					<div class="form-group">
						<div class="input-group">
							<input placeholder="Cari Materi" type="text" class="form-control search">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
							</div>	
						</div>
						
					</div>
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
						<span>All</span> |
						<span>Berbayar</span> | 
						<span>Promo</span> |
						<span>Gratis</span>
						<div class="right-box-filter">
							<span>Urutkan :</span>
							<select style="width: auto" class="custom-select" name="" id="">
								<option value="" selected="">Terbaru</option>
								<option value="">Populer</option>
							</select>
						</div>
					</div>
				</div>
				<div class="main-content ZNjxnsj">

					@foreach($materi as $m)
					<div class="content-item">
						<div class="thumb" style="background-image: url('{{ url('') }}/assets/img/materi/{{ $m->gambar }}')">
							<div class="label btn-warning">{{ $m->kategori->nama_kategori }}</div>
						</div>
						<div class="desc-item">
							<p><a href="{{ url("materi/" . $m->id . '/' . str_slug($m->nama_materi, '-')) }}">{{ $m->nama_materi }}</a></p>
							<div class="teacher">
								<img src="{{ url('') }}/assets/img/david_naista.jpg" alt="david_naista"> David Naista
							</div>
							<div class="clearfix"></div>
							<div class="status">
								<div class="left-status">
									<i class="fa fa-heart"></i> {{ $m->love }}
									<i class="fa fa-user"></i> {{ $m->user }}
								</div>
								<div class="right-status">
									<p>
										@if ($m->harga !== 'FREE')
										Rp. {{ number_format($m->harga) }}
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