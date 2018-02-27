<!doctype html>
@if (App::isLocale('ar'))
<html dir="rtl" lang="{{ app()->getLocale() }}" >
@else
<html dir="ltr"  lang="{{ app()->getLocale() }}">
@endif
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="keywords" content="Shortener links, short links, link shortener, paid url shortener, make money online, short link and earn money">
    <meta name="description" content="Earn money for each visitor to your shortened links with Shortener links! We pay for each visit to your short link.">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('styles/home/css/landing.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/member/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/home/css/font.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/home/css/flexslider.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/member/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/home/css/bootstrap.css') }}" type="text/css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body class="home-page" >
    @include('_includes.home.header')  
<div>

    <!--Start Content-->
    @yield('content')
    
</div>
    <footer class="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="footer-col connect col-md-12">
                        <div class="footer-col-inner press">
                            <ul class="press-list list-inline row">
                                <li class="col-md-3 hidden-sm hidden-xs">
                                </li>
                                <li class="col-md-2 col-sm-4 col-xs-4">
                                    <img alt="" src="{{asset('styles/home/images/tc.png')}}" class="img-responsive">
                                </li>
                                <li class="col-md-2 col-sm-4 col-xs-4">
                                    <img alt="" src="{{asset('styles/home/images/paypal.png')}}" class="img-responsive">
                                </li>
                                <li class="col-md-2 col-sm-4 col-xs-4">
                                    <img alt="" src="{{asset('styles/home/images/payza.png')}}" class="img-responsive">
                                </li>
                                <li class="col-md-3 hidden-sm hidden-xs">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-bar">
            <div class="container">
                <small class="copyright">Copyright @ 2018-2019
                     <a href="{{url('/')}}">Shortener links</a>
                </small>
                @if (App::isLocale('ar'))
                <span class="pull-left">
                @else
                <span class="pull-right">
                @endif
                    {{--  <small class="links">
                        <a href="mailto:info@Shortener links">DMCA</a>
                    </small>  --}}
                    <small class="links">
                        <a href="{{route('terms')}}">@lang('lang.terms')</a>
                    </small>
                </span>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    @include('_includes.home.scripts')
    @yield('scripts')
    <div id="topcontrol" title="Scroll Back to Top" style="position: fixed; bottom: 5px; right: 5px; opacity: 0; cursor: pointer;">
        <i class="ion ion-chevron-up">
        </i>
    </div>

</body>
</html>