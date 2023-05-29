<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Url Path -->
    <meta name="server-path" content="{{ url('/') }}">
    <title>@yield('title', 'Al-Hamd Traders')</title>
    <!-- Favicons -->
    <link href="{{asset('images/favicon.png')}}" rel="icon">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/price_rangs.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
</head>

<body>

    {{-- Inclute Header of welsite --}}
    @include('frontend.partials.header')

    {{-- Body of content  --}}
    @yield('frontend_body')

    {{-- Include Footer of site  --}}
    @include('frontend.partials.footer')


        <div id="back-top">
            <a class="wrapper" title="Go to Top" href="#">
                <div class="arrows-container">
                    <div class="arrow arrow-one">
                    </div>
                    <div class="arrow arrow-two">
                    </div>
                </div>
            </a>
        </div>


        <script src="{{asset('frontend/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>

        <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/jquery.slicknav.min.js')}}"></script>

        <script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/jquery.magnific-popup.js')}}"></script>
        <script src="{{asset('frontend/assets/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/waypoints.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/price_rangs.js')}}"></script>
        {{-- <script src="{{asset('frontend/contactus/create.js')}}"></script> --}}
        <script src="{{asset('frontend/assets/js/plugins.js')}}"></script>
        <script src="{{asset('frontend/assets/js/main.js')}}"></script>
        <script src="{{asset('frontend/assets/custom.js')}}"></script>

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    </body>

    </html>
