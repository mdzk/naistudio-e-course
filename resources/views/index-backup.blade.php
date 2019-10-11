<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="Pragma" content="no-cache"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kursus Online Naistdio</title>
    <link rel="stylesheet" href="assets/plugin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/plugin/font-awesome/font-awesome.min.css">
</head>

<body>
    <!-- go to top -->

    <div id="go-top">
        <div class="go-top-wrepper text-center">
            <a href="#header">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <!-- loader -->
    <div id="loader">
        <div class="loader-wrepper">
            <img src="assets/img/loader.gif" alt="">
        </div>
    </div>

    <!-- header -->
    <div id="nav-mobile">
        <div class="nav-hover">
            <div class="box-nav-hover">
                <div class="bg-nav-hover"></div>
            </div>
        </div>
        <div id="close-nav-mobile">
            <i class="fa fa-bars" onclick="hideNavMobile()"></i>
        </div>
        <div class="nav-mobile-wrepper">
            <ul class="text-center ">
                @if(Auth::user())
                <li class="nav">
                    <a href="#home" class="mx-auto">Home</a>
                </li>
                <li class="nav">
                    <a href="#search" class="mx-auto">Cari Video</a>
                </li>
                <li class="nav">
                    <a href="#kategori" class="mx-auto">Kategori</a>
                </li>
                <li class="nav">
                    <a href="#about" class="mx-auto">Tentang Kami</a>
                </li>
                <li class="nav mb-3">
                    <a href="#kontak" class="mx-auto">Kontak</a>
                </li>
                <li class="button mb-4">
                    <a href="{{ url('profile') }}" class="btn btn-border btn-nav">Profile</a>
                </li>
                @else
                <li class="nav">
                    <a href="#home" class="mx-auto">Home</a>
                </li>
                <li class="nav">
                    <a href="#search" class="mx-auto">Cari Video</a>
                </li>
                <li class="nav">
                    <a href="#kategori" class="mx-auto">Kategori</a>
                </li>
                <li class="nav">
                    <a href="#about" class="mx-auto">Tentang Kami</a>
                </li>
                <li class="nav mb-3">
                    <a href="#kontak" class="mx-auto">Kontak</a>
                </li>
                <li class="button mb-4">
                    <a href="{{ url('login') }}" class="btn btn-border btn-nav">Masuk</a>
                </li>
                <li class="button">
                    <a href="{{ url('daftar') }}" class="btn btn-color btn-nav btn-color-black">Daftar</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
    <header id="header">
        <div class="header-wrepper header-scroll">
            <div class="header-logo">
                <img src="assets/img/logowhite.png" alt="">
            </div>
            <div class="header-nav-dekstop float-right">
                <ul class="list-style">
                    @if(Auth::user())
                    <li class="nav">
                        <a href="#home">Home</a>
                    </li>
                    <li class="nav">
                        <a href="#search" class="mx-auto">Cari Video</a>
                    </li>
                    <li class="nav">
                        <a href="#about">Tentang Kami</a>
                    </li>
                    <li class="nav">
                        <a href="#kategori">Kategori</a>
                    </li>
                    <li class="nav">
                        <a href="#kontak">Kontak</a>
                    </li>
                    <li class="button">
                        <a href="{{ url('/profile') }}" class="btn btn-border btn-nav">Profile</a>
                    </li>
                    @else
                    <li class="nav">
                        <a href="#home">Home</a>
                    </li>
                    <li class="nav">
                        <a href="#search" class="mx-auto">Cari Video</a>
                    </li>
                    <li class="nav">
                        <a href="#about">Tentang Kami</a>
                    </li>
                    <li class="nav">
                        <a href="#kategori">Kategori</a>
                    </li>
                    <li class="nav">
                        <a href="#kontak">Kontak</a>
                    </li>
                    <li class="button">
                        <a href="" class="btn btn-border btn-nav">Masuk</a>
                    </li>
                    <li class="button">
                        <a href="" class="btn btn-color btn-nav">Daftar</a>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="header-nav-responsive float-right">
                <a href="javascript:" onclick="showNavMobile()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>

        </div>
    </header>
    <div class="clear"></div>


    <div class="bg-white" id="home">
        <!-- hero banner -->
        <section id="hero-banner">
            <div class="content-grid">
                <div class="content-hero-wrepper row">
                    <div class="col-md-6 hero-des">
                        <div class="hero-des-wrapper">
                            <h1 class="hero-banner-effect-1 content-2-effect">Belajar Online Seru</h1>
                            <div class="hero-banner-effect-1 hero-img-wrepper content-2-effect" id="hero-img-action-1">
                                <img src="assets/img/img1.png" alt="">
                            </div>
                            <p class="content-2-effect hero-banner-effect-1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi necessitatibus quod
                                repudiandae illum quibusdam explicabo nemo, minus cumque autem ratione.
                            </p>
                            <div class="button content-2-effect hero-banner-effect-1">
                                <a href="{{ url('Kursus') }}" class="btn btn-lg btn-color btn-hero">Belajar Sekarang</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 hero-img" id="hero-img">
                        <div class="hero-img-wrepper hero-img-2" id="hero-img-action-2">
                            <img src="assets/img/img1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- search -->

        <section id="search">
            <div class="content-grid">
                <div class="search-wrepper">
                    <div class="content-search row">
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="search-input">
                                        <input type="text" name="" id="" placeholder="Cari Video">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="search-input flex">
                                        <input type="text" name="" id="" placeholder="Ketegori">
                                        <span class="icon">
                                            <i class="fa fa-chevron-down"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="button">
                                <a href="" class="btn btn-search btn-primary flex">
                                    <span><i class="fa fa-search"></i>Cari</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="search-end">
                        <h5><b>Hasil Pencarian</b></h5>
                        <div class="search-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="box-search-video">
                                        <div class="thumd-video">
                                            <!-- <i class="fas fa-play-circle"></i> -->
                                            <img src="assets/img/thumb/thumb1.jpg" alt="">
                                        </div>
                                        <div class="label-video">
                                            <div class="label-wrepper">
                                                <h6>Programming Web</h6>
                                            </div>
                                        </div>
                                        <div class="des-video">
                                            <h5>Lorem ipsum dolor sit amet.</h5>
                                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit,
                                            eligendi. Ad quasi laudantium voluptatibus minus!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box-search-video">
                                        <div class="thumd-video">
                                            <!-- <i class="fas fa-play-circle"></i> -->
                                            <img src="assets/img/thumb/thumb1.jpg" alt="">
                                        </div>
                                        <div class="label-video">
                                            <div class="label-wrepper">
                                                <h6>Programming Web</h6>
                                            </div>
                                        </div>
                                        <div class="des-video">
                                            <h5>Lorem ipsum dolor sit amet.</h5>
                                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit,
                                            eligendi. Ad quasi laudantium voluptatibus minus!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box-search-video">
                                        <div class="thumd-video">
                                            <!-- <i class="fas fa-play-circle"></i> -->
                                            <img src="assets/img/thumb/thumb1.jpg" alt="">
                                        </div>
                                        <div class="label-video">
                                            <div class="label-wrepper">
                                                <h6>Programming Web</h6>
                                            </div>
                                        </div>
                                        <div class="des-video">
                                            <h5>Lorem ipsum dolor sit amet.</h5>
                                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit,
                                            eligendi. Ad quasi laudantium voluptatibus minus!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="button text-center">
                                        <a href="{{ url('kursus') }}" class="btn btn-video">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clear"></div>

        <!-- tentang Kami -->
        <section id="about">
            <div class="content-grid">
                <div class="about-wrepper text-center">
                    <div class="medium-title">
                        <h4>Tentang Kami</h4>
                        <div class="line mx-auto"></div>
                    </div>
                    <div class="about-des">
                        <h4>"Memberikan Solusi Belajar Untuk Anda"</h4>
                        <p class="text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem
                            blanditiis
                            consectetur aperiam,
                            repellat aliquid maxime deleniti nisi adipisci libero quia. Facilis eligendi nobis vero id
                        consectetur nulla veritatis consequuntur officiis.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="bg-transparent">
        <!-- banner 1 -->
        <section id="banner-1" class="text-center">
            <div class="bg-color bg-color-blue">
                <div class="content-grid">
                    <div class="banner-1-wrepper text-center">
                        <h1 data-video="2312" data-playlist="45">
                            <b>23.790</b> video dalam <b>45</b> playlist materi</h1>
                            <p class="text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus
                                officiis
                                voluptatum eos id
                            vero magnam dolore assumenda dignissimos sequi sint!</p>
                            <div class="button">
                                <a href="{{ url('kursus') }}" class="btn btn-lg btn-border btn-banner-1">Tampilkan Playlist</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="bg-white">
            <!-- content 1 -->
            <section id="content-1">
                <div class="content-grid">
                    <div class="content-wrepper">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="content-img" id="content-1-img-1">
                                    <img src="assets/img/img2.png" alt="" class="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-1-des">
                                    <div class="medium-title text-left">
                                        <h4 class="content-1-effect">Mulai Belajar Bersama Kami!</h4>
                                        <div class="animate-top" id="content-1-img-2">
                                            <img src="assets/img/img2.png" alt="">
                                        </div>
                                        <p class="content-1-effect">Lorem ipsum dolor, sit amet consectetur adipisicing
                                            elit. Tempora nesciunt
                                            voluptatum
                                            est, optio ipsum numquam consectetur omnis exercitationem similique neque
                                            reiciendis
                                        incidunt cupiditate ducimus dicta vitae temporibus accusamus non illo.</p>
                                        <div class="button button-content content-1-effect">
                                            <a href="{{ url('kursus') }}" class="btn btn-lg btn-color btn-content-1 ">Lihat
                                            Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- content 2    -->
            <section id="content-2">
                <div class="content-grid">
                    <div class="content-wrepper">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-2-des">
                                    <div class="medium-title text-left">
                                        <h4 class="content-2-effect">Kapanpun & Dimanapun</h4>
                                        <p class="content-2-effect">Lorem ipsum dolor, sit amet consectetur adipisicing
                                            elit. Tempora nesciunt
                                            voluptatum
                                            est, optio ipsum numquam consectetur omnis exercitationem similique neque
                                            reiciendis
                                        incidunt cupiditate ducimus dicta vitae temporibus accusamus non illo.</p>


                                        <div class="button button-content content-2-effect">
                                            <div class="animate-top" id="content-2-img-1">
                                                <img src="assets/img/img3.png" alt="">
                                            </div>
                                            <a href="" class="btn mb-5 btn-lg btn-color btn-content-1">Lihat Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-img-2" id="content-2-img-2">
                                    <img src="assets/img/img3.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="bg-transparent">
            <!-- banner 2 -->
            <section id="banner-2">
                <div class="bg-color bg-color-blue">
                    <div class="content-grid">
                        <div class="baner-2-wrepper">
                            <div class="banner-2-img mx-auto">
                                <img src="assets/img/logowhite.png" alt="">
                            </div>
                            <div class="banner-2-title">
                                <h5>Belajar kini jadi lebih efektif!</h5>
                                <p>Lorem ipsum dolor sit amet consectetur <b>adipisicing elit. Quas, est?</b></p>
                            </div>
                            <div class="banner-2-des">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="flex">
                                            <span class="icon-banner-2">
                                                <i class="fa fa-play-circle"></i>
                                            </span>
                                            <h5>Kualitas video Terbaik</h5>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda at quo
                                                reiciendis
                                            tempora. Saepe, dolor!</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="flex">
                                            <span class="icon-banner-2">
                                                <i class="fa fa-play-circle"></i>
                                            </span>
                                            <h5>Kami Siap Menjawab Pertannyaan Anda</h5>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda at quo
                                                reiciendis
                                            tempora. Saepe, dolor!</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="flex">
                                            <span class="icon-banner-2">
                                                <i class="fa fa-play-circle"></i>
                                            </span>
                                            <h5>Membuka Forum Diskusi</h5>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda at quo
                                                reiciendis
                                            tempora. Saepe, dolor!</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="button text-center">
                                            <a href="" class="btn btn-lg btn-color btn-banner-2">Tunggu apa lagi?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="bg-white">
            <!-- Kategori -->
            <section id="kategori">
                <div class="content-grid">
                    <div class="kategori-wrepper text-center">
                        <div class="medium-title">
                            <h4>Apa Yang Ingin Anda Pelajari?</h4>
                            <div class="line mx-auto mb-5"></div>
                        </div>
                        <div class="kategori">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="box-kategori">
                                                <div class="img-kategori">
                                                    <img src="assets/img/icon_web.png" alt="">
                                                </div>
                                                <div class="des-kategori">
                                                    <h6>Web Desain & Programming</h6>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium
                                                    necessitatibus quis sint omnis?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="box-kategori">
                                                <div class="img-kategori">
                                                    <img src="assets/img/icon_design.png" alt="">
                                                </div>
                                                <div class="des-kategori">
                                                    <h6>Desain Grafis</h6>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium
                                                    necessitatibus quis sint omnis?</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="box-kategori">
                                                <div class="img-kategori">
                                                    <img src="assets/img/icon_android.png" alt="">
                                                </div>
                                                <div class="des-kategori">
                                                    <h6>Aplikasi Android</h6>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium
                                                    necessitatibus quis sint omnis?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="box-kategori">
                                                <div class="img-kategori">
                                                    <img src="assets/img/icon_kantor.png" alt="">
                                                </div>
                                                <div class="des-kategori">
                                                    <h6>Administrasi Perkantoran</h6>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium
                                                    necessitatibus quis sint omnis?</p>
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

            <!-- kontak -->
            <section id="kontak">
                <div class="content-grid">
                    <div class="kontak-wrepper">
                        <div class="medium-title">
                            <h4>Kontak</h4>
                            <div class="line mx-auto mb-5"></div>
                        </div>
                        <div class="kontak">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="search-input">
                                        <input type="text" name="" id="" placeholder="Nama*">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="search-input">
                                        <input type="email" name="" id="" placeholder="Email*">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="search-input">
                                        <input type="text" name="" id="" placeholder="No. Tlp*">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="search-input">
                                        <input type="text" name="" id="" placeholder="Subject*">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="search-input">
                                        <textarea name="" id="" cols="30" placeholder="Pesan*" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="button text-center">
                                        <a href="" class="btn btn-border btn-kontak">Kirim Pesan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="bg-transparent">
            <!-- banner 3 -->
            <section id="banner-3">
                <div class="content-grid">
                    <div class="banner3-wrepper">
                        <div class="banner-3">
                            <div class="row">
                                <div class="col-12">
                                    <h1>Berminat Belajar Bersama Kami?</h1>
                                </div>
                                <div class="col-sm-9">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus vitae at modi
                                        architecto
                                        fuga, provident harum neque porro praesentium veritatis temporibus iste, sed
                                        nesciunt
                                    velit blanditiis minus voluptas impedit. Aliquid. lorem</p>
                                </div>
                                <div class="col">
                                    <div class="button btn-wrepper text-center">
                                        <a href="{{ url('login') }}" class="btn btn-color btn-banner-3">Daftar Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- footer -->
        <footer id="footer">
            <div class="bg-color bg-color-black">
                <div class="content-grid">
                    <div class="footer-wrepper">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-sm-12 mb-3">
                                        <div class="footer">
                                            <h3>SKILAS</h3>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora ipsa
                                                placeat
                                                ipsam
                                                quisquam eius dolores voluptas sapiente sequi voluptatem quidem! Lorem
                                                ipsum
                                                dolor sit
                                                amet consectetur adipisicing elit. Enim ad atque alias veritatis! Animi
                                                omnis,
                                                nesciunt
                                                voluptas nulla quibusdam qui, dolores impedit libero architecto nobis eos
                                                atque
                                                iste
                                            facilis blanditiis?</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="footer">
                                            <h3>KATEGORI</h3>
                                            <ul class="list-ketegori">
                                                <li>
                                                    <a href="">Administrasi Perkantoran</a>
                                                </li>
                                                <li>
                                                    <a href="">Aplikasi Android</a>
                                                </li>
                                                <li>
                                                    <a href="">Desain Grafis</a>
                                                </li>
                                                <li>
                                                    <a href="">Web Desain & Programming</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="footer">
                                            <h3>NAISTUDIO</h3>
                                            <p>Dusun 4 RT 14 RW 07, Sumberrejo 43 Polos
                                            Kecamatan Batanghari Kabupaten Lampung Timur. </p>
                                            <div class="flex kontak-naistudio">
                                                <span>
                                                    <i class=" fa-mail"></i>
                                                </span>
                                                <span>
                                                    <p>hello.naistudio@gmail.com</p>
                                                </span>
                                            </div>
                                            <div class="flex kontak-naistudio">
                                                <span>
                                                    <i class="fa fa-headphone"></i>
                                                </span>
                                                <span>
                                                    <p>0896-3153-1651</p>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="sosial-icon">
                                    <div class="flex mx-auto">
                                        <span>
                                            <div class="bg-icon text-center">
                                                <i class="fa fa-facebook"></i>
                                            </div>
                                        </span>
                                        <span>
                                            <div class="bg-icon text-center">
                                                <i class="fa fa-twitter"></i>
                                            </div>
                                        </span>
                                        <span>
                                            <div class="bg-icon text-center">
                                                <i class="fa fa-instagram"></i>
                                            </div>
                                        </span>
                                        <span>
                                            <div class="bg-icon text-center">
                                                <i class="fa fa-youtube"></i>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <section id="footer-button">
            <div class="footer-2">
                <div class="footer-logo">
                    <img src="assets/img/logowhite.png" alt="">
                </div>
                <div class="copyright text-center">
                    <p>Copyright &copy By Naistudio All Rights Reserved.</p>
                </div>
            </div>
        </section>
        <script src="assets/plugin/jquery.js"></script>
        <script src="assets/js/functions.js"></script>
        <script src="assets/js/script.js"></script>
    </body>

    </html>