<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title') | CV Naistudio</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ url('/') }}/assets/img/favicon.png">
	<!-- Main Style -->
	<link rel="stylesheet" href="{{ url('/') }}/assets/css/main.css">
	<link rel="stylesheet" href="{{ url('/') }}/assets/css/responsive.css">

	<!-- PLUGIN -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ url('/') }}/assets/plugin/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ url('/') }}/assets/plugin/font-awesome/font-awesome.min.css">
</head>
<body>
	<header id="header">
		<div class="header-wrepper">
			<div class="logo-header float-left p-1">
				<a href="{{ url('/') }}"><img src="{{ url('/') }}/assets/img/logo.png" alt="" class="mt-2"></a>
			</div>
			<div class="nav float-right" id="nav-dekstop">
				@if(Auth::user())
				<li class="pt-1">
					<a class="" href="{{ url('/') }}">HOME</a>
				</li>	
				<li class="pt-1">
					<a class="" href="{{ url('/kursus') }}">KURSUS</a>
				</li>
				<li class="pt-1">
					<a class="" href="{{ url('/tentang') }}">TENTANG KAMI</a>
				</li>
				<li class="pt-1">
					<a class="" href="{{ url('/kontak') }}">KONTAK</a>
				</li>
				<li class="pt-1">
					<a class="" href="javascript:">|</a>
				</li>
				<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i style="position: relative;top: -4px" class="fa fa-bell"></i></a>
          <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header">Notifications
            </div>
            <div style="height: auto" class="dropdown-list-content dropdown-list-icons">
              <a href="#" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-icon bg-primary text-white">
                  <i class="fa fa-book"></i>
                </div>
                <div class="dropdown-item-desc">
                  Materi baru telah hadir!
                  <div class="time text-primary">2 Min Ago</div>
                </div>
              </a>
              <a href="#" class="dropdown-item">
                <div class="dropdown-item-icon bg-info text-white">
                  <i class="fa fa-user"></i>
                </div>
                <div class="dropdown-item-desc">
                  <b>Painem</b> mengikuti anda
                  <div class="time">10 Hours Ago</div>
                </div>
              </a>
              <a href="#" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-icon bg-primary text-white">
                  <i class="fa fa-book"></i>
                </div>
                <div class="dropdown-item-desc">
                  Materi baru telah hadir!
                  <div class="time text-primary">2 Min Ago</div>
                </div>
              </a>
              <a href="#" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-icon bg-primary text-white">
                  <i class="fa fa-book"></i>
                </div>
                <div class="dropdown-item-desc">
                  Materi baru telah hadir!
                  <div class="time text-primary">2 Min Ago</div>
                </div>
              </a>
            </div>
            <div class="dropdown-footer text-center">
              <a href="#">View All <i class="fa fa-chevron-right"></i></a>
            </div>
          </div>
        </li>
        <li class="dropdown"><a href="#" style="padding: 0px;" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" style="width: 30px;" @if(empty(Auth::user()->gambar))  src="{{ url('/') }}/assets/img/avatar-1.png" @else src="{{ url('') }}/assets/img/user/{{ Auth::user()->gambar }}" @endif	 class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{ url('/profile') }}" class="dropdown-item has-icon">
                <i class="fa fa-user"></i> Profile
              </a>
              <a href="{{ url('profile/setting/' . Auth::user()->id . '/' . str_slug(Auth::user()->name, '-')) }}" class="dropdown-item has-icon">
                <i class="fa fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fa fa-sign-out-alt"></i> Logout
              </a>
            </div>
        </li>
					@else
					<li class="pt-1">
						<a class="" href="{{ url('/') }}">HOME</a>
					</li>
					<li class="pt-1">
						<a class="" href="{{ url('/kursus') }}">KURSUS</a>
					</li>
					<li class="pt-1">
						<a class="" href="{{ url('/tentang') }}">TENTANG KAMI</a>
					</li>
					<li class="pt-1">
						<a class="" href="{{ url('/kontak') }}">KONTAK</a>
					</li>
					<li class="pt-1">
						<a class="" href="javascript:">|</a>
					</li>
					<li class="pt-1">
						<a class="" href="{{ url('/login') }}">MASUK</a>
					</li>
					<li>
						<a href="javascript:" class="btn btn-sm btn-gradient disabled">
							<span class="m-2">DAFTAR</span>
						</a>
					</li>
				@endif
			</div>
			<div class="nav float-right" id="nav-bars">
				<li>
					<i class="fa fa-bars"></i>
				</li>
			</div>
		</div>
	</header>
	<div id="nav-mobile" style="display: none;">
		<div id="close-nav-mobile">
			<i class="fa fa-bars" onclick=""></i>
		</div>
		<div class="nav-mobile-wrepper">
			<ul class="text-center ">
				<li class="nav">
					<a href="javascript:" class="mx-auto">Home</a>
				</li>
				<li class="nav">
					<a href="javascript:" class="mx-auto">Kategori</a>
				</li>
				<li class="nav">
					<a href="javascript:" class="mx-auto">Tentang Kami</a>
				</li>
				<li class="nav mb-3">
					<a href="javascript:" class="mx-auto">Kontak</a>
				</li>
				<li class="flex mt-4 mb-3 margin-center">
					<span>
						<a href="javascript:" class="btn btn-border-blue">Masuk</a>
					</span>
					<span>
						<a href="javascript:">|</a>
					</span>
					<span>
						<a href="javascript:" class="btn btn-color-blue disabled">Daftar</a>
					</span>
				</li>
			</ul>
			<p class="text-center mb-1 copy-header">
				<span>&copy; CV Naistudio</span>
			</p>
		</div>
	</div>

	<section id="body" class="section">
		@yield('content')
	</section>

	<footer>
		<div class="footer-wrepper">
			<div class="footer-item text-center mb-4 mt-2">
				<h1>NAISTUDIO</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, dolore cum unde aperiam quibusdam, culpa rem nihil libero. Ducimus repellat sint eveniet obcaecati et, excepturi libero ipsa quo consequatur earum.</p>
			</div>
			<div class="footer-copy text-center">
				<p>Copyright &copy; CV Naistudio</p>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="footer-bottom-wrepper">
				<div class="footer-img">
					<img src="{{ url('/') }}/assets/img/logowhite.png" alt="">
				</div>
				<div class="footer-social-icon float-right">
					<div class="flex social-icon">
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
	</footer>

	<script src="{{ url('/') }}/assets/plugin/jquery.js"></script>
	<script src="{{ url('/') }}/assets/plugin/popper.min.js"></script>
	<script src="{{ url('/') }}/assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{ url('/') }}/assets/js/functions.js"></script>
	<script src="{{ url('/') }}/assets/js/main.js"></script>
</body>
</html>