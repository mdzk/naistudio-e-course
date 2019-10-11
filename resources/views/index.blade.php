<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Kursus Online | CV Naistudio</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/img/favicon.png">
	<!-- Main Style -->
	<link rel="stylesheet" href="assets/css/private.css">

	<!-- PLUGIN -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="assets/plugin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
	<link rel="stylesheet" href="assets/plugin/font-awesome/font-awesome.min.css">
</head>
<body>
    
    <header id="hp-header">
        <div class="container">
            <div class="title"><img src="assets/img/logo.png" alt="logo" class="logo"></div>
            <nav class="navigation">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/kursus') }}">Course</a></li>
                    <li><a href="{{ url('kontak') }}">Contact Us</a></li>
                    <li><a href="{{ url('login') }}" class="bt-login" href="">Log In</a></li>
                    <li class="burger-menu"><div></div></li>
                </ul>
            </nav>
        </div>
        <div class="clearfix"></div>
    </header>

    <section id="banner">
        <div class="container">
            <div class="left-banner">
                <p>Nikmati sensasi <br> Belajar Online.</p>
                <p>Kini naistudio memiliki media pembelajaran yang mudah diakses dimanapun.</p>
                <a href="{{ url('daftar') }}">Gabung Sekarang</a>
                <a class="btn-watch" href=""><img src="assets/img/play.png">Watch Now</a>
            </div>
            <div class="right-banner">
                <img src="assets/img/banner.svg" alt="banner">
            </div>
        </div>
        <div class="clearfix"></div>
    </section>

    <section id="feature">
        <div class="container">
            <div class="box">
                <img src="assets/img/f-left.svg" alt="">
                <p>Metode Belajar Secara</p>
                <p>VISUAL</p>
                <p>Metode pembelajaran yang <br>
                diberikan berupa video</p>
            </div>
            <div class="box">
                <img src="assets/img/f-center.svg" alt="">
                <p>Belajar Coding</p>
                <p>DIMANA SAJA</p>
                <p>Media pembelajaran yang <br>
                dapat diakses dimanapun <br>
                dan kapanpun.</p>
            </div>
            <div class="box">
                <img src="assets/img/f-right.svg" alt="">
                <p>Penyampaian Materi</p>
                <p>MUDAH DIPAHAMI</p>
                <p>Materi-materi berkualitas <br> 
                yang mudah dipahami</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>

    <section id="populer">
        <div class="container">
            
            <div class="left-populer">
                <p>Materi <br> Populer saat ini</p>
                <p>Ayo jelajahi semua materi yang telah <br>
                kami sediakan, dapatkan pengalaman <br>
                luar biasa dari kami.</p>
                <a href="{{ url('kursus') }}">lihat semua</a>
            </div>

            <div class="right-populer">

                    @foreach($materi as $m)
                    <div class="lesson">
                        <div class="thumbnail" style="background-image: url('assets/img/materi/{{ $m->gambar  }}')">
                            <div class="label-lesson">{{ $m->kategori->nama_kategori }}</div>
                        </div>
                        <div class="desc-lesson">
                            <p><a href="{{ url("materi/" . $m->id . '/' . str_slug($m->nama_materi, '-')) }}">{{ $m->nama_materi }}</a></p>
                            <div class="bottom-lesson">
                                <div class="teacher-lesson">
                                    <img  @if(empty($m->users->gambar)) src="assets/img/avatar-1.png" @else src="assets/img/user/{{ $m->users->gambar }} @endif" alt="david_naista"> {{ $m->users->name }}
                                </div>
                                <div class="clearfix"></div>
                                <div class="status-lesson">
                                    <div class="left-status-lesson">
                                        <i class="fa fa-heart"></i> {{ $m->love }}
                                        <i class="fa fa-user"></i> {{ $m->user }}
                                    </div>
                                    <div class="right-status-lesson">
                                        <p>
                                            
                                            @if ($m->harga !== 'FREE')
                                            Rp. {{ number_format($m->harga) }}
                                            @else
                                            FREE
                                            @endif

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    @endforeach
            </div>
            <div class="clearfix"></div>
        </div>
    </section>

    <section id="footer">
        <footer>
            <div class="flex-f container">
                <div class="footer-content">
                    <h5>About</h5>
                    <img src="assets/img/logo-footer.png">
                    <p>Kursus merupakan salah satu produk naistudio 
                    yang sangat di gemari, pengajar dari kursus 
                    merupakan pengajar yang sudah berpengalaman 
                    dibidangnya.</p>
                </div>
                <div class="footer-content">
                    <h5>Media</h5>
                    <a href="http://facebook.com/naistudio"><i class="fa fa-facebook"></i> Naistudio</a>
                    <a href="http://twitter.com/naistudio"><i class="fa fa-twitter"></i> Naistudio</a>
                    <a href="http://instagram.com/naistudio"><i class="fa fa-instagram"></i> Naistudio</a>
                    <a href=""><i class="fa fa-phone"></i> +62896 3153 1651</a>
                    <a href="http://mailto:hello.naistudio@gmail.com"><i class="fa fa-envelope"></i> hello.naistudio@gmail.com</a>
                </div>
                <div class="footer-content">
                    <h5>Navigation</h5>
                    <a href="{{ url('/') }}"> Home</a>
                    <a href="{{ url('kursus') }}"> Kursus</a>
                    <a href="{{ url('tentang') }}"> Tentang Kami</a>
                    <a href="{{ url('kontak') }}"> Kontak</a>
                    <a href="{{ url('daftar') }}"> Gabung Yuk!</a>
                </div>
                <div class="footer-content">
                    <h5>Follow us</h5>
                    <p>Dapatkan info terbaru dari kami</p>
                    <div class="input-group">
                        <input placeholder="Email" type="Email" class="form-control">
                        <div class="input-group-append"> 
                            <button class="btn btn-primary" type="button"><i class="fa fa-send"></i></button>
                        </div>  
                    </div>
                </div>
            </div>
            <p align="center" style="margin-top: 15px;">Copyright &copy; 2019. Naistudio</p>
        </footer>
    </section>

    <!-- Javascript -->
    <script src="assets/plugin/jquery.js"></script>
    <script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>