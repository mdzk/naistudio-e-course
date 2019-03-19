$(document).ready(function () {
    // window size
    var windowWidth = $(window).width();
    var windowHeight = $(window).height();

    // hide loader
    $('#loader').hide();

    // dupliakate header
    dupiklatHeader($('header#header'));

    // animation banner
    $('.hero-banner-effect-1').each(function (i) {
        setTimeout(function () {
            $('.hero-banner-effect-1').eq(i).addClass('show-content');
        }, 100 * i);
    });
    $('#hero-img-action-2 img').addClass('show-content');

    $(window).resize(function () {
        var windowWidth = $(this).width();
        var windowHeight = $(this).height();

        // Thumd Video Size
        thumdVideoSize($('.thumd-video'));

        // img kategori
        wrepperImgKetegori($('.img-kategori'));

    });

    $(window).scroll(function (i) {
        var windowWidth = $(this).width();
        var windowHeight = $(this).height();

        var y = $(this).scrollTop();
        var banner1 = $('#banner-1').offset().top;
        var content1 = $('#content-1').offset().top;
        var content2 = $('#content-2').offset().top;
        var kategori = $('#kategori').offset().top;

        // show header fixed
        if (y > (windowHeight / 2)) {
            $('.header-fixed').addClass('header-fixed-show');
            $('#go-top').addClass('show-content');
        } else {
            $('#go-top').removeClass('show-content');
        }

        if (y < 1) {
            $('.header-fixed').removeClass('header-fixed-show');
        }



        if (y > (banner1 - windowHeight)) {
            paralaxBanner1($('#banner-1'), y);
        }

        if (y > (banner1 - windowHeight)) {
            paralaxBanner2($('#banner-2'), y);
        }

        // show animation content 1
        if (y > content1 - 290) {
            $('#content-1-img-1 img').addClass('show-content');
            $('#content-1-img-2 img').addClass('show-content');
            $('.content-1-effect').each(function (i) {
                setTimeout(function () {
                    $('.content-1-effect').eq(i).addClass('show-content');
                }, 100 * i);
            });
        }

        // show animation content 2
        if (y > content2 - 290) {
            $('#content-2-img-1 img').addClass('show-content');
            $('#content-2-img-2 img').addClass('show-content');
            $('.content-2-effect').each(function (i) {
                setTimeout(function () {
                    $('.content-2-effect').eq(i).addClass('show-content');
                }, 100 * i);
            });
        }

        // show animation kategori
        if (y > kategori - 290) {
            $('.box-kategori').each(function (i) {
                setTimeout(function () {
                    $('.box-kategori').eq(i).addClass('show-content box-kategori-content');
                }, 100 * i);
            });
        }


        // if (y = (banner1 - (windowHeight / 2))) {
        //     var location = $('#banner-1 h1');
        //     var dataVideo = location.data('video');
        //     var dataPlaylist = location.data('playlist');

        //     eachNilai(location, dataVideo, dataPlaylist);
        // }
    });

    // Thumd Video Size
    thumdVideoSize($('.thumd-video'));

    // img kategori
    wrepperImgKetegori($('.img-kategori'));


    // mobile nav hover
    // $('#nav-mobile li').hover(function () {
    //     hoverEffectNavMobile(this);
    // });

    // input click
    $('input , textarea').click(function () {
        $('input, textarea').parent().css({
            'border-color': '#b4b4b4'
        });
        $(this).parent().css({
            'border-color': '#246DF8'
        });
    });


    $('#ini').click(function () {


    });


});