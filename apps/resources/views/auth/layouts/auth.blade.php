<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Sistem Informasi Toko Obat Las Roha</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/auth/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="css/auth/font-awesome.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="css/auth/style.css">

	@yield('page-css')

	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left">
						<img class="img-fluid" src="/images/auth/Las Roha.png" alt="Toko Obat Las Roha">
					</div>
					<div class="login-right">
						<div class="login-right-wrap">
							@yield('content')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->

</body>
<!-- jQuery -->
<script src="assets/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>
<script src="{{asset('js/app.js')}}"></script>

@yield('page-js')

</html>