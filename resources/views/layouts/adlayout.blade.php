	<!DOCTYPE html>
	<!-- Html tag Starts -->
	@if (App::isLocale('ar'))
	<html dir="ltr" lang="{{ app()->getLocale() }}"  class="app js no-touch no-android chrome no-firefox no-iemobile no-ie no-ie10 no-ie11 no-ios">
	@else
	<html dir="ltr" lang="{{ app()->getLocale() }}"  class="app js no-touch no-android chrome no-firefox no-iemobile no-ie no-ie10 no-ie11 no-ios">
	@endif
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
		<title>{{ config('app.name', 'Shorterlinks') }}</title>

		<!-- Styles -->
		<link rel="stylesheet" href="{{ asset('styles/member/css/dashboard.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ asset('styles/member/css/styles.min.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ asset('styles/member/css/app.min.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ asset('styles/member/css/nprogress.css') }}" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css"  type="text/css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.material.min.css" type="text/css">
  
		<!-- Head Scripts -->
		<style>
			.text-xs{font-size: 15px;}
			.text-sm{font-size: 18px;}
			.text-md{font-size: 21px;}
			.text-lg{font-size: 24px;}
		</style>
	</head>
	<!--/ Head-->
	<body >
		<section class="vbox">
			@include("_includes.admin.header")
			<section id="main" class="hbox stretch">
				<aside class="bg-dark lter aside-md hidden-print" id="nav" data-pjax="true">
				<div>
					@include("_includes.admin.aside")
			 	</div>
			    </aside>
				<section id="content">
					<section class="vbox">
						<div class="col-md-12">
							@include('tools.partials.flash_message')  
						</div>
						<!--Start  Content-->
						@yield('content')
						<!--End Content-->	
					 </section>
					<script>
						var dataset = [{"label":"Views","data":[[1,0],[2,0],[3,0],[4,0],[5,0],[6,0],[7,0],[8,0],[9,3],[10,0],[11,0],[12,0],[13,0],[14,0],[15,0],[16,0],[17,0],[18,0],[19,0],[20,0],[21,0],[22,0],[23,0],[24,0],[25,0],[26,0],[27,0],[28,0],[29,0],[30,0],[31,0]]}];
					</script>
						
					</section>
				    <aside class="bg-light lter b-l aside-md hide" id="notes">
						<div class="wrapper">@lang('lang.notification')</div>
					</aside>
		   </section>
		</section>
		<div class="modal fade" id="modal-shorten">
			<div class="modal-dialog modal-shorten">
				<div class="modal-content bg-dark">
					<div class="modal-body">
						<div class="padder">
							<form method="POST" action="/shorten" accept-charset="UTF-8" id="form-shorten" class="form-shorten">
								<input name="_token" type="hidden" value="Laa1GkLh9gVhbXTxJHsw9msCWsFuVgNJ1g9jrXcX">
								<h5 id="msg-shorten"> @lang('lang.shorter') @lang('lang.new_link')</h5>
								<input id="input-shorten" name="url" class="form-control m-b" placeholder="Your URL Here" value="">
								<button id="btn-shorten" class="btn btn-rounded btn-lg btn-icon btn-danger" type="submit">
									<i class="fa fa-paper-plane"></i>
								</button>
								<button id="btn-copy" class="hidden btn btn-rounded btn-lg btn-icon btn-success" type="button" data-clipboard-action="cut" data-clipboard-target="#input-shorten">
									<i class="fa fa-copy"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>	
		<!-- Scripts  -->
		@include('_includes.Footerscripts')
		@yield('scripts')
		
	</body>
	</html>