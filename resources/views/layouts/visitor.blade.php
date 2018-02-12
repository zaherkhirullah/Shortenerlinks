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

		<title> Make short links and earn the biggest money - ouo.io</title>
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
					sitekey: "6LcF5EUUAAAAAJ_qkzlldZkWkKuiTMXErAeM1Nj5",
					callback: verifyCallback
				})
			};
		</script>
		<script src='https://www.google.com/recaptcha/api.js'></script>

	</head>
	<body>
	<style>
    .centCaptcha
    {
        width: 302px;
        height: 352px;
    }
    .relative{
        position: relative;
    }
    .absolute{
        position: absolute;
    }
    .captchaResponse{
        width: 250px; 
        height: 80px;
        position: absolute;
        border-style: none;
        bottom: 21px; 
        left: 25px;
        margin: 0px;
        padding: 0px; 
        right: 25px;
    }
    .gResponse{ 
        style="width: 250px;
        height: 80px; 
        border: 1px solid #c1c1c1;
        margin: 0px; 
        padding: 0px;
        resize: none;
        }
</style>
		<header>
			<nav class="navbar navbar-default navbar-top">
				<div class="container">
					<div class="col-md-12">
						<div class="navbar-header page-scroll">
							<a class="navbar-brand" href="/">
							<i class="ion ion-ios-rose-outline" ></i>
                       Shorter Links
       					<i class="ion ion-ios-rose-outline" ></i>
							</a>
						</div>
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
								<li>
									<a href="{{url('/')}}">Home</a>
								</li>
								<li>
									<a href="{{route('rates')}}">Payout Rates</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
		</header>
		<section class="content">
			@yield('content')
		</section>
		<div class="about">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-3">
						<img class="img-responsive" src="{{asset('/styles/member/images/world.png')}}">
					</div>
					<div class="col-md-6">
						<h2>Know a little about ouo.io</h2>
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
					<a class="btn-main" href="http://ouo.io/auth/signup">Join Now</a>
				</div>
			</div>
		</div>
		<div class="footer-copy">
			<div class="container">
				<span>&copy; 2015. URL shorten service by <a href="http://ouo.io" target="_blank">ouo.io</a>.</span>
				<span class="pull-right">
					<a href="http://ouo.io/terms">Terms</a>
				</span>
			</div>
		</div>

		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-24098524-7', 'auto');
			ga('require', 'linkid', 'linkid.js');
			ga('send', 'pageview');
		</script>
		<script type='text/javascript'>
			var adParams = {p: '70728218', text: 'Skip the captcha and Get to the shorten URL.', btnText: 'Ok', barColor: '#fbecad', btnBgColor: '#FFFFFF',direction: 'LTR',position :'top',popOnClose:'true'  , serverdomain: 'wmedia'  ,addPuzzleImage:true };
		</script>
		<script type='text/javascript' src='https://wmedia.adk2.co/wmedia/tags/xnotificationbar/xnotificationbar.js?ap=1317'>
		</script>
	</body>
	</html>
	