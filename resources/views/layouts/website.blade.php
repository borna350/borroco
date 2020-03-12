<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('website') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{ asset('website') }}/css/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Cormorant:300,400,400i,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600&display=swap" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwxfea8ecYMmGKMO39JF1ko5bhF4UocpM"></script>
    <script>
        let assetUrl = "{{ asset('/website') }}";
    </script>
</head>
<body>
{{--Loader --}}
    <div id="loading"><span class="logo"></span><span class="progress"></span></div>
{{--Loader End--}}

<!-- Header -->
@if(\Request::route()->getName() !== 'shop')
    @include('website.includes.header')
    @endif
<!-- End Header -->

<!-- Content -->
<div id="page-content">
    @yield('content')
</div>
<!-- End Content -->

<!-- Footer -->
    @include('website.includes.footer')
<!-- End Footer -->



<script src="{{ asset('website') }}/js/jquery.min.js"></script>
<script src="{{ asset('website') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('website') }}/js/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/3.1.8/imagesloaded.pkgd.min.js"></script>
<script src="{{ asset('website') }}/js/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="{{ asset('website') }}/js/masonry.js"></script>
<script src="{{ asset('website') }}/js/custom.js"></script>
</body>
</html>
