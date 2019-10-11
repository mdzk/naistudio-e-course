@extends('template')
@section('title')
	Materi Kursus
@endsection
@section('content')
<div class="wrepper">
	<div class="row content">
		<div class="left-content">
			


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
			                      <li><a href="{{ url('kursus') }}" class="dropdown-item">Terbaru</a></li>
			                      <li><a href="{{ url('kursus/popular') }}" class="dropdown-item">Popular</a></li>
			                    </ul>
			                </div>
						</div>
					</div>
				</div>
				{{ csrf_field() }}
				<div id="post_data" class="main-content ZNjxnsj"></div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
 
 var _token = $('input[name="_token"]').val();

 load_data('', _token);

 function load_data(id="", _token)
 {
  $.ajax({
   url:"{{ route('loadmore.load_data') }}",
   method:"POST",
   data:{id:id, _token:_token},
   success:function(data)
   {
    $('#load_more_button').parent().remove();
    $('#post_data').append(data);
   }
  })
 }

 $(document).on('click', '#load_more_button', function(){
  var id = $(this).data('id');
  $('#load_more_button').html('<b>Loading...</b>');
  load_data(id, _token);
 });

});
</script>
@endsection