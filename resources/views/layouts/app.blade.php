<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Ecommerce project">
    <meta name="robots" content="all,follow">
    <meta name="author" content="" />


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assests/images/favicon.ico')}}" />

    

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">

    {{-- arabic font al yamani --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    
    <link rel="stylesheet" href="{{asset('frontend/assests/css/vendor/bootstrap.min.css')}}" />

    <link href="{{asset('frontend/assests/css/vendor/bootstrap.min-rtl.css')}}" rel="stylesheet"  />

    <link href="{{asset('frontend/assests/css/vendor/vendor.min.css')}}" rel="stylesheet" />

    
    <link href=" https://cdn.jsdelivr.net/npm/glyphicons-halflings@1.9.1/css/glyphicons-halflings.min.css " rel="stylesheet">

    <link href="{{asset('frontend/assests/css/style-games.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('frontend/assests/css/style-rtl.css')}}" class="languages" />

    <link href="{{asset('frontend/assests/css/icons.css')}}" rel="stylesheet" />
    
    @yield('style')
    
</head>

<body class="has-squared-btns has-loader-bg equal-height has-btn-not-upper">

    <div id="app">

        {{-- main header --}}
        @include('partial.frontend.header')

        {{-- main header --}}
        @include('partial.frontend.header-side-panel')

        <div class=" page-content py-4">
                @yield('content')
        </div>

        {{-- main header --}}
        @include('partial.frontend.footer')

    </div>

    <!-- JavaScript files-->
    <script src="{{asset('frontend/assests/js/vendor-special/lazysizes.min.js')}}"></script>
    <script src="{{asset('frontend/assests/js/vendor-special/ls.bgset.min.js')}}"></script>
    <script src="{{asset('frontend/assests/js/vendor-special/ls.aspectratio.min.js')}}"></script>
    <script src="{{asset('frontend/assests/js/vendor-special/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/assests/js/vendor-special/jquery.ez-plus.js')}}"></script>
    <script src="{{asset('frontend/assests/js/vendor/vendor.min.js')}}"></script>
    <script src="{{asset('frontend/assests/js/app-html.js')}}"></script>
    <!-- <script src="assests/js/styleswitcher.js"></script> -->
    @yield('script')
    
</body>
</html>
