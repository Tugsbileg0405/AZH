<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ардчилсан залуучуудын холбоо') }}</title>

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon.png') }}">
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link href="{{asset('css/gaia.css')}}" rel="stylesheet" >
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrapValidator.min.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet ' type='text/css '>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('css/fonts/pe-icon-7-stroke.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/lightslider.css' )}}">
    <link rel="stylesheet" href="{{ asset('css/lightslider.css' )}}">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
       
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }} " type="text/javascript "></script>
    <script src="{{ asset('js/bootstrap.js ') }}" type="text/javascript "></script>
    <script src="{{ asset('js/lightslider.min.js') }} "></script>
    <script src="{{ asset('js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrapValidator.min.js') }}"></script>
    <!--  js library for devices recognition -->
    <script type="text/javascript " src="{{ asset('js/modernizr.js') }} "></script>
    <!--  script for google maps   -->
     <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAChBN0MVMVMizgvWhVZBFZ3afH4xWNGhQ">
    </script>
    <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>
    <!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
    <script type="text/javascript " src="{{ asset('js/gaia.js') }} "></script>
    <script type="text/javascript " src="{{ asset('js/custom.js ') }}"></script>
    @stack('script')
</body>
</html>

