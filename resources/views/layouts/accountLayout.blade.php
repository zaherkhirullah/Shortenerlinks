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
    <title>{{ config('app.name', 'Shortener links') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('styles/member/css/dashboard.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/member/css/styles.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/member/css/app.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/member/css/nprogress.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" type="text/css">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.material.min.css" type="text/css">

    <!-- Head Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>
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
        @include("_includes.user.header")
        <section id="main" class="hbox stretch">
            <section id="content">
                <section class="vbox">
                    <section class="vbox" data-pjax="true">
                        <section class="scrollable">
                            <section class="hbox stretch">
                             <div class="col-sm-12">  
                                @include('tools.partials.flash_message')
                            </div>   
                                 <!--Start  Content-->
                                @yield('content')
                                <!--End Content-->	
                                @include('_includes.account.aside')                                
                            </section>
                        </section>
                    </section>
                </section>
            </section>
       </section>
    </section>
    @include('_includes.Footerscripts')    
</body>
</html>