<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset("admin/assets/vendor/bootstrap/css/bootstrap.min.css") }}">
    <link href="{{ asset("admin/assets/vendor/fonts/circular-std/style.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset("admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css") }}">
    <link rel="stylesheet" href="{{ asset("admin/assets/vendor/fonts/flag-icon-css/flag-icon.min.css") }}">

    {{-- <link rel="stylesheet" href="{{ asset("admin/assets/vendor/charts/morris-bundle/morris.css") }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset("admin/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css") }}"> --}}
    @yield('page.styles')
    <title>{{ config('app.name') }} Admin</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @routes
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">

    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    @inertia
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
    
</div>

<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
@yield("page.scripts")
</body>

</html>
