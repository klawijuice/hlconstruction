<title>@yield('page.title', __('_meta.title')) | {{ env('APP_NAME') }}</title>
{{-- OPEN GRAPH --}}
<meta name="og:title" content="@yield('page.title', __('_meta.title')) | {{ env('APP_NAME') }}">
<meta name="og:description" content="@yield('page.description', __('_meta.description'))">
<meta name="og:keywords" content="@yield('page.keywords', __('_meta.keywords'))">
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="@yield('page.description', __('_meta.description'))" />
<meta name="keywords" content="@yield('page.keywords', __('_meta.keywords'))" />
<meta name="developer" content="STECHUP">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- IMPORTANT!!! remember CSRF token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
