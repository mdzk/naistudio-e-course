$(document).ready(function(){
	responsiveThumb();
	responsiveThumPlaylist();
	// resize  document
	$(window).resize(function(){
		// resize thumbnail 9 : 16
		responsiveThumb();
		responsiveThumPlaylist();
	});

	// show header

	$('#nav-bars i').click(function() {
		$('#nav-mobile').slideToggle(500);
	});

    $('.mobile-category').find('a:eq(1)').addClass('btn btn-danger');
    $('.mobile-category').find('a:eq(2)').addClass('btn btn-warning');
    $('.mobile-category').find('a:eq(3)').addClass('btn btn-success');
    $('.mobile-category').find('a:eq(4)').addClass('btn btn-dark');
    $('.mobile-category').find('a:eq(5)').addClass('btn btn-primary');

});