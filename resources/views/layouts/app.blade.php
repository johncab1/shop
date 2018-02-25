<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<!-- Favicons -->
	<link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
	<link rel="icon" href="../assets/img/favicon.png">
	<title>
		Signup &#45; Material Kit by Creative Tim
	</title>
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/material-kit.css') }}">
	<style type="text/css">

		body
		{
			background-color: white;
		}

	</style>

</head>


		<body class="@yield('body-class')">
			<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
		<div class="container">
			<div class="navbar-translate">
				<a style="color: #2c2c27;" class="navbar-brand txt-negro" href="{{ url('/') }}">App Shop</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					<span class="navbar-toggler-icon"></span>
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav ml-auto">
						@guest
							<li class="nav-item"><a style="color: #2c2c27;" class="nav-link" href="{{ route('login') }}">Ëntrar</a></li>
							<li class="nav-item"><a style="color: #2c2c27;" class="nav-link" href="{{ route('register') }}">Registro</a></li>
						@else
							<li class="nav-item dropdown">
								<a href="#" style="color: #2c2c27;"class="nav-link dropdown-toggle" data-toggle="dropdown" id="menu" aria-haspopup="true" aria-expanded="false">
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>

								<div class="dropdown-menu" aria-labelledby="menu">
									
										<a class="dropdown-item" href="{{ route('logout') }}"
											onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
											Logout
										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
									
								</div>
							</li>
						@endguest

					<!-- <li class="nav-item">
						<a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" data-original-title="Follow us on Twitter">
							<i class="fa fa-twitter"></i>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" data-original-title="Like us on Facebook">
							<i class="fa fa-facebook-square"></i>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" data-original-title="Follow us on Instagram">
							<i class="fa fa-instagram"></i>
						</a>
					</li> -->
				</ul>
			</div>
		</div>
	</nav>

	<div class="wrapper">
		@yield('content')
	</div>
</body>

	<!--   Core JS Files   -->
	<script src="{{ asset('js/core/jquery.min.js') }}"></script>
	<script src="{{ asset('js/core/popper.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap-material-design.js')}}"></script>
	<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
	<script src="{{ asset('js/plugins/moment.min.js') }}"></script>
	<!--    Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
	<script src="{{ asset('js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
	<!--    Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="{{ asset('js/plugins/nouislider.min.js')}}"></script>
	<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
	<script src="{{ asset('js/material-kit.js?v=2.0.1')}}"></script>

</html>

