<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
@if(env('APP_DEBUG') == false || env('APP_ENV') == "production")
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-6260JWMZ97"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());

            gtag('config', 'G-6260JWMZ97');
        </script>
@endif
@include('layouts.guest.partials.meta')

<!-- Google Font-->
    <link href="//fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link rel="stylesheet" href="/guest/assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/guest/assets/plugins/css/bootstrap.min.css">
    <!-- Animate CSS-->
    <link rel="stylesheet" href="/guest/assets/plugins/css/animate.css">
    <!-- Owl Carousel CSS-->
    <link rel="stylesheet" href="/guest/assets/plugins/css/owl.css">


    <!-- Custom CSS-->
    <link rel="stylesheet" href="/guest/assets/css/styles.css">
    <link rel="stylesheet" href="/guest/assets/css/responsive.css">
    @yield('page.style')
</head>
<body class="dark-vertion black-bg">

@include('layouts.guest.partials.header-blog')
@yield('content')
@include('layouts.guest.partials.footer')


<!--
    ==============
    * JS Files *
    ==============
    -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<!-- jQuery -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- popper -->
<script src="/guest/assets/plugins/js//popper.min.js"></script>
<!-- bootstrap -->
<script src="/guest/assets/plugins/js/bootstrap.min.js"></script>
<!-- owl carousel -->
<script src="/guest/assets/plugins/js/owl.carousel.js"></script>
<!-- validator -->
<script src="/guest/assets/plugins/js/validator.min.js"></script>
<!-- wow -->
<script src="/guest/assets/plugins/js/wow.min.js"></script>
<!-- mixin js-->
<script src="https://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js"></script>
<!-- circle progress-->
<script src="/guest/assets/plugins/js/circle-progress.js"></script>
<!-- jquery nav -->
<script src="/guest/assets/plugins/js/jquery.nav.js"></script>
<!-- Fancybox js-->
<script src="/guest/assets/plugins/js/jquery.fancybox.min.js"></script>
<!-- Map api -->
<script src="//maps.googleapis.com/maps/api/js?v=3.exp&amp;key=AIzaSyCRP2E3BhaVKYs7BvNytBNumU0MBmjhhxc"></script>
<!-- isotope js-->
<script src="/guest/assets/plugins/js/isotope.pkgd.js"></script>
<script src="/guest/assets/plugins/js/packery-mode.pkgd.js"></script>
<!-- Custom Scripts-->
<script src="/guest/assets/js/map-init.js"></script>
<script src="/guest/assets/js/custom-scripts.js"></script>
</body>
</html>
