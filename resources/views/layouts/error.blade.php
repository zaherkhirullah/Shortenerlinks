<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shorterlinks') }}</title>

    <!-- Styles -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="{{ asset('styles/app.css') }}" rel="stylesheet">
</head>
<style>
    #error_form{
        background-color: #fff;
        border:1px solid #fff;
        border-radius: 5px;
        box-shadow: 5px 10px 30px -5px rgba(0,0,0,0.8);
        width:560px;
        min-height:555px ;
        height: auto;
        margin: 100px auto ;
    }
</style>
<body>
    <div id="error_form">
         @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

</body>
</html>
