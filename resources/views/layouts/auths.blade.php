<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>@yield('title') - {{ config('app.name') }}</title>
	<meta charset="UTF-8">
	<meta name="Author" content="Bruno Nicholas">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="{{ asset('start/images/icons/favicon.png') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('start/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('start/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('start/vendor/animate/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('start/vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('start/vendor/select2/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('start/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('start/css/main.css') }}">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100" style="padding-top: 15px;">
				<div style="margin: 5px;" class="col-12 text-center">
					<h2 style="color: #245580;">{{ config('app.name') }}! @guest @else {{ Auth::user()->name }} @endguest</h2>
				</div>
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ asset('start/images/img-01.png') }}" alt="IMG">
				</div>

				@yield('content')
			</div>
		</div>
	</div>

	<script src="{{ asset('start/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('start/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('start/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('start/vendor/select2/select2.min.js') }}"></script>
	<script src="{{ asset('start/vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="{{ asset('start/js/main.js') }}"></script>

</body>
</html>