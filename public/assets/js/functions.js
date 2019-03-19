function thumdVideoSize(e) {
    var x = e.width();

    // formula y = x / 16 * 9
    var y = Number(x) / 16 * 9;
    e.css({
        height: y
    });
}

function wrepperImgKetegori(e) {
    var x = e.width();
    var y = x;
    e.css({
        height: y
    });
}

function paralaxBanner1(e, y) {
    e.css({
        'background-position-y': '-' + (y / 2) + 'px'
    })
}

function paralaxBanner2(e, y) {
    e.css({
        'background-position-y': '-' + (y / 2.2) + 'px'
    })
}

// function hoverEffectNavMobile(e) {
//     var scrollTop = $(window).scrollTop();
//     var heightElementFromTop = $(e).children().offset().top;
//     var heightContent = $(e).height();

//     $('.nav-hover').css({
//         top: heightElementFromTop - scrollTop
//     });

//     $('.box-nav-hover').css({
//         height: heightContent
//     });

//     $('.bg-nav-hover').animate({
//         width: '100%',
//         opacity: '0.7'
//     }, 300);
// }

function showNavMobile() {
    $('#nav-mobile').css({
        transform: 'rotate(0deg) scale(1)',
        transition: '0.3s ease-out'
    });
}

function hideNavMobile() {
    $('#nav-mobile').css({
        transform: 'rotate(90deg) scale(5)',
        transition: '0.3s ease-out'
    });
}

function dupiklatHeader(e) {
    var template = e.html();
    e.find('.header-wrepper').before(template);
    e.find('.header-wrepper:first').removeClass('header-scroll').addClass('header-fixed');


}




function responsiveThumb(){
	// formula height = 9 / 16 * widthThumb
	var widthThumb = $('.thumb').width();
	var heightThumb = 9 / 16 * widthThumb;
	$('.thumb').height(heightThumb);
}

function responsiveThumPlaylist(){
    // formula height = 9 / 16 * widthThumb
    var widthThumb = $('.article-image').width();
    var heightThumb = 9 / 16 * widthThumb;
    $('.article-header').height(heightThumb);
    $('.article-image').height(heightThumb);
}

