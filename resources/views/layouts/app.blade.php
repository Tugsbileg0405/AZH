<html lang="{{ config('app.locale') }}" class="no-js" prefix="og: http://ogp.me/ns#">
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Facebook Metadata /-->
    <meta property="og:title" content="Ардчилсан Залуучуудын холбоо" />
    <meta property="og:image" content="{{asset('img/logo/facebooklogo.png')}}" />
    <meta property="og:description" content="1206 онд Их Монгол улс байгуулагдсан түүхэн үйл явдлыг билэгдэн ардчиллын төлөөх улс төрийн намууд 2000 оны 12 дугаар сарын 06-ны өдөр Их Хурлаа хийж, Ардчилсан намыг байгуулсан билээ. Энэхүү нэгдэлд оролцогч улс төрийн намуудын дэргэдэх залуучуудын байгууллагууд эвсэн нэгдэж, 2000 оны 12 дугаар сарын 07-ны өдөр анхны Үндэсний чуулганаа хуралдуулж, Ардчилсан намын дэргэдэх албан ёсны залуучуудын байгууллага болох Ардчилсан Залуучуудын Холбоог үүсгэн байгуулсан юм."
    />

    <!-- Google Metadata /-->
    <meta itemprop="name" content="Ардчилсан Залуучуудын холбоо">
    <meta itemprop="description" content="1206 онд Их Монгол улс байгуулагдсан түүхэн үйл явдлыг билэгдэн ардчиллын төлөөх улс төрийн намууд 2000 оны 12 дугаар сарын 06-ны өдөр Их Хурлаа хийж, Ардчилсан намыг байгуулсан билээ. Энэхүү нэгдэлд оролцогч улс төрийн намуудын дэргэдэх залуучуудын байгууллагууд эвсэн нэгдэж, 2000 оны 12 дугаар сарын 07-ны өдөр анхны Үндэсний чуулганаа хуралдуулж, Ардчилсан намын дэргэдэх албан ёсны залуучуудын байгууллага болох Ардчилсан Залуучуудын Холбоог үүсгэн байгуулсан юм."
    />
    <meta itemprop="image" content="{{asset('img/logo/facebooklogo.png')}}" />

    <!-- Twitter Metadata /-->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@demyouth" />
    <meta name="twitter:title" content="Ардчилсан Залуучуудын холбоо">
    <meta name="twitter:description" content="1206 онд Их Монгол улс байгуулагдсан түүхэн үйл явдлыг билэгдэн ардчиллын төлөөх улс төрийн намууд 2000 оны 12 дугаар сарын 06-ны өдөр Их Хурлаа хийж, Ардчилсан намыг байгуулсан билээ. Энэхүү нэгдэлд оролцогч улс төрийн намуудын дэргэдэх залуучуудын байгууллагууд эвсэн нэгдэж, 2000 оны 12 дугаар сарын 07-ны өдөр анхны Үндэсний чуулганаа хуралдуулж, Ардчилсан намын дэргэдэх албан ёсны залуучуудын байгууллага болох Ардчилсан Залуучуудын Холбоог үүсгэн байгуулсан юм."
    />
    <meta name="twitter:image" content="{{asset('img/logo/facebooklogo.png')}}" />

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