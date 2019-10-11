<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login | CV Naistudio</title>
	<link rel="stylesheet" href="assets/plugin/itsform/itsform.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
<div class="if">
	<div class="if-panel">
		<div class="if-panel-inner">
			<div class="if-brand">
				<center>
					<img src="assets/img/logo.png" alt="logo">
				</center>
			</div>
			<div class="if-text">
				<h1>Welcome to <b>Naistudio</b></h1>
				<p>Sebelum memulai harap login dahulu atau register jika belum memiliki akun.</p>
			</div>
			<div class="if-form">
				<div class="if-nav">
					<ul>
						<li class="active"><a href="#" class="if-form-go" data-go="0">Login</a></li>
						<li><a href="#" class="if-form-go" data-go="1">Register</a></li>
					</ul>
				</div>
				<div class="if-forms">
					<!-- Form: 0 -->
					<form id="login-form" class="active" method="POST">
						@csrf
						<div class="if-group">
							<label>Email</label>
							<input type="email" autocomplete="email" name="email" class="if-input">
						</div>
						<div class="if-group password-group">
							<label>Password <a href="#" class="if-form-go" data-go="2">Lupa Password?</a></label>
							<input type="password" name="password" autocomplete="current-password" class="if-input">
						</div>
						<button class="if-btn" name="submit" type="submit" value="submit">
							Masuk
						</button>
					</form>
					<!-- Form: 1 -->
					<form id="register-form" method="POST" action="{{ url('/daftar') }}">
						@csrf
						<div class="if-group">
							<label>Name</label>
							<input type="text" autocomplete="off" name="name" class="if-input">
						</div>
						<div class="if-group">
							<label>Email</label>
							<input type="email" autocomplete="off" name="email" class="if-input">
						</div>
						<div class="if-group password-group">
							<label>Password</label>
							<input type="password" name="password" autocomplete="current-password" class="if-input">
						</div>
						<button class="if-btn" name="daftar" type="submit" value="submit">
							Daftar
						</button>
					</form>
					<!-- Form: 2 -->
					<form id="forgot-form">
						<div class="if-group">
							<label>Email</label>
							<input type="email" autocomplete="email" name="email" class="if-input">
						</div>
						<button class="if-btn">
							Reset Password
						</button>
					</form>
				</div>
			</div>
		</div>
		<div class="copy-login">
			<p>Copyright &copy; CV Naistudio</p>
		</div>
	</div>
	<div class="if-main">

	</div>
</div>

<script src="assets/plugin/itsform/itsform.js"></script>
</body>
</html>