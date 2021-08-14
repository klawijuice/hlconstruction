<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
@if(env('APP_DEBUG') == false || env('APP_ENV') == "production")
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-6260JWMZ97"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-6260JWMZ97');
        </script>
    @endif
    @include('layouts.guest.partials.meta')
    <meta charset="utf-8" />
    <title>Landrick - Saas & Software Landing Page Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
    <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
    <meta name="author" content="Shreethemes" />
    <meta name="email" content="support@shreethemes.in" />
    <meta name="website" content="https://shreethemes.in" />
    <meta name="Version" content="v3.5.0" />
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Bootstrap -->
    <link href="{{asset("guest/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="{{ asset('guest/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <!-- Slider -->
    <link rel="stylesheet" href="{{asset('guest/css/tiny-slider.css')}}"/>
    <!-- Main Css -->
    <link href="{{asset("guest/css/style.css")}}" rel="stylesheet" type="text/css" id="theme-opt" />
    {{--            <link href="{{asset("guest/css/colors/default.css")}}" rel="stylesheet" id="color-opt">--}}
    {!! htmlScriptTagJsApi() !!}
    @yield('page.style')
</head>

<body class="dark-vertion home-slider black-bg">
<!-- Start Loader -->
<div class="section-loader">
    <div class="loader">
        <div></div>
        <div></div>
    </div>
</div>
<!-- End Loader -->

<!--
===================
   NAVIGATION
===================
-->

<x-header-layout/>
{{--@yield('content')--}}
<!-- Page Content -->
<main>
    {{ $slot }}
</main>

<x-footer-layout/>

<!--
        ==============
        * JS Files *
        ==============
        -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--slider service-->
<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
<!-- Back to top -->
<!-- javascript -->
<script src="{{asset("guest/js/bootstrap.bundle.min.js")}}"></script>
<!-- SLIDER -->
<script src="{{asset("guest/js/tiny-slider.js")}}"></script>
<script src="{{asset("guest/js/easy_background.js")}}"></script>
<!-- Icons -->
<script src="{{asset("guest/js/feather.min.js")}}"></script>
<!-- Main Js -->
<script src="{{asset("guest/js/plugins.init.js")}}"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
<script src="{{asset("guest/js/app.js")}}"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->

<script>
    easy_background("#home",
        {
            slide: ["guest/images/real/1.jpg", "guest/images/real/2.jpg", "guest/images/real/3.jpg"],
            delay: [2000, 2000, 2000]
        }
    );
</script>
</body>
