	<!DOCTYPE html>
	<!-- Html tag Starts -->
	<html lang="{{ app()->getLocale() }}"  class="app js no-touch no-android chrome no-firefox no-iemobile no-ie no-ie10 no-ie11 no-ios">
	<!-- Head tag Starts -->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Kewords Meta -->
		<meta name="keywords" content="{{ config('app.name', 'Shortener links') }}, short links, link shortener, bitly, bit.ly, adf.ly, adfly, ad network, make money, earn money">
		<meta name="description" content="{{ config('app.name', 'Shortener links') }} Publisher Backend">

		<!-- Title -->
		<title>Earn money on short links. Make short links Or upload your files and earn the biggest money - {{ config('app.name', 'Shortener links') }} </title>

		<title> Make short links and earn the biggest money - {{ config('app.name', 'Shorter links') }}</title>
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Questrial" type="text/css" />
		<link rel="stylesheet" href="{{ asset('styles/member/css/bootstrap.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ asset('styles/member/css/link.css') }}" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" type="text/css">
		<script>
			var verifyCallback = function(e) {
				document.getElementById("captcha-form").submit()
			};
			var onloadCallback = function() {
				grecaptcha.render("captcha", {
					sitekey: "{{$site_key}}",
					callback: verifyCallback
				})
			};
		</script>
		<script src='https://www.google.com/recaptcha/api.js'></script>

	</head>
	<body>

		<header>
			<nav class="navbar navbar-default navbar-top">
				<div class="container">
					<div class="col-md-12">
						<div class="navbar-header page-scroll">
							<a class="navbar-brand" href="{{url('/')}}">
							<i class="ion ion-ios-rose-outline" ></i>
                       			Shorter Links
       					<i class="ion ion-ios-rose-outline" ></i>
							</a>
						</div>
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
								<li>
									<a class="text-success" href="{{url('/')}}">@lang('lang.home_page')</a>
								</li>
								<li>
									<a  href="{{route('rates')}}">@lang('lang.payout_rates') </a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
		</header>
		<section class="content">
			<section class="row">
			<span class="col-md-6 pull-right">    
					@include('tools.partials.flash_message') 
			</span>
		</section>
			@yield('content')
		</section>
		<div class="about">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-3">
						<img class="img-responsive" src="{{asset('/styles/member/images/world.png')}}">
					</div>
					<div class="col-md-6">
						<h2>Know a little about {{ config('app.name', 'Shorter links') }}</h2>
						<span class="dot">
						</span>
						<p>{{ url('/') }}is a URL shortening service that allows users to get paid whenever they share links and someone clicks.</p>
						<p>We pay for ALL legitimate visitor you bring to your links and payout at least $1.5 per 1000 views. Multiple views from the same viewer are also counted thus you will be benefiting from all your traffic.</p>
						<a href="{{url('/')}}">Read more</a>
					</div>
				</div>
			</div>
		</div>
		<div class="join-now">
			<div class="container">
				<div class="col-md-offset-1 col-md-10 text-center">
					<h2>Shorten URLs and earn money</h2>
					<span class="dot center">
					</span>
					<p>Signup for an account in just 2 minutes. Once you've completed your registration just start creating short URLs and sharing the links with your family and friends.</p>
					<a class="btn-main" href="{{route('register')}}">Join Now</a>
				</div>
			</div>
		</div>
		<div class="footer-copy">
			<div class="container">
			<span>&copy; 2015. URL shorten service by <a href="{{url('/')}}" target="_blank">ShortenerLinks</a>.</span>
				<span class="pull-right">
					<a href="{{route('terms')}}">Terms</a>
				</span>
			</div>
		</div>
		@include('_includes.visitor.scripts')
		@yield('scripts')
	</body>
	</html>