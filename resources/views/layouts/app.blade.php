<html lang="{{ config('app.locale') }}" class="no-js" prefix="og: http://ogp.me/ns#">
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Facebook Metadata /-->
   
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:image" content="@yield('image')" />
    <meta property="og:description" content="@yield('description')" />

    <!-- Google Metadata /-->
    <meta itemprop="name" content="@yield('title')">
    <meta itemprop="description" content="@yield('description')"/>
    <meta itemprop="image" content="@yield('image')" />

    <!-- Twitter Metadata /-->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@demyouth" />
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')"/>
    <meta name="twitter:image" content="@yield('image')" />

    <title>{{ config('app.name', 'Ардчилсан залуучуудын холбоо') }}</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link href="{{asset('css/gaia.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrapValidator.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/lightslider.css' )}}">
    <link rel="stylesheet" href="{{ asset('css/lightgallery.min.css' )}}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css' )}}">
    <link rel="stylesheet" href="{{ asset('css/jssocials.css' )}}">
    <link rel="stylesheet" href="{{ asset('css/jssocials-theme-flat.css' )}}">
</head>

<body>
    <div id="app">
        
        @if(Route::current()->getName() == 'index')
            @include('partials.navbarHome')
        @elseif(Route::current()->getName() == 'admin.login')
        
        @else
            @include('partials.navbarNoTrans')
        @endif

        @yield('content')

        @if(Route::current()->getName() !== 'admin.login')
             @include('partials.footer')
        @endif
    </div>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ])!!};
    </script>
    <script src="{{ asset('js/jquery.min.js') }} " type="text/javascript "></script>
    <script src="{{ asset('js/bootstrap.js ') }}" type="text/javascript "></script>
    <script src="{{ asset('js/lightslider.min.js') }} "></script>
    <script src="{{ asset('js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrapValidator.min.js') }}"></script>
    <script src="{{ asset('js/jssocials.min.js') }}"></script>
    <!--  js library for devices recognition -->
    <script type="text/javascript " src="{{ asset('js/modernizr.js') }} "></script>
    <!--  script for google maps   -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAChBN0MVMVMizgvWhVZBFZ3afH4xWNGhQ">

    </script>
    <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>
    <!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
    <script type="text/javascript " src="{{ asset('js/gaia.js') }} "></script>
    <script type="text/javascript " src="{{ asset('js/custom.js ') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js ') }}"></script>
    @stack('script')
</body>

</html>