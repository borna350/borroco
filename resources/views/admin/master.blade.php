<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Barroco Admin">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('admin') }}/f-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/morrisjs/morris.css" />
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/toastr/toastr.min.css">
    <link href="{{ asset('admin') }}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="{{ asset('admin') }}/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/footable-bootstrap/css/footable.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/footable-bootstrap/css/footable.standalone.min.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('admin') }}/css/main.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/css/ecommerce.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/css/color_skins.css">

    @yield('page_css')
</head>
<body class="theme-orange">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('admin') }}/logo-mark.svg" width="48" height="48" alt="Compass"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
@include('admin.includes.header')
<!-- End Top Bar -->

<!-- Left Sidebar -->
@include('admin.includes.navbar')
<!-- end Left Sidebar -->

<!-- Right Sidebar -->
@include('admin.includes.right_sidebar')
<!--End Right Sidebar -->

<!-- Main Content area -->
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                @yield('page_title')
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" target="_blank"><i class="zmdi zmdi-home"></i> Website</a></li>
                    @yield('breadcrumb')
                </ul>
            </div>
        </div>
    </div>
    <!-- Import Main content -->
    @yield('content')

</section>
<!--End Main Content area -->

<!-- Jquery Core Js -->
<script src="{{ asset('admin') }}/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{ asset('admin') }}/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{ asset('admin') }}/bundles/footable.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{ asset('admin') }}/bundles/morrisscripts.bundle.js"></script> <!-- Morris Plugin Js -->
<script src="{{ asset('admin') }}/bundles/flotscripts.bundle.js"></script> <!-- flot charts Plugin Js -->
<script src="{{ asset('admin') }}/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
<script src="{{ asset('admin') }}/bundles/knob.bundle.js"></script> <!-- Jquery Knob Plugin Js -->
<script src="{{ asset('admin') }}/bundles/mainscripts.bundle.js"></script>
<script src="{{ asset('admin') }}/js/pages/ecommerce.js"></script>
<script src="{{ asset('admin') }}/js/pages/charts/jquery-knob.min.js"></script>
<script src="{{ asset('admin') }}/bundles/datatablescripts.bundle.js"></script>
<script src="{{ asset('admin') }}/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="{{ asset('admin') }}/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('admin') }}/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="{{ asset('admin') }}/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
<script src="{{ asset('admin') }}/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="{{ asset('admin') }}/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="{{ asset('admin') }}/js/pages/tables/jquery-datatable.js"></script>
<script src="{{ asset('admin') }}/plugins/toastr/toastr.min.js"></script>
<script src="{{ asset('admin') }}/plugins/ckeditor/ckeditor.js"></script>
<script src="{{ asset('admin') }}/plugins/light-gallery/js/lightgallery-all.min.js"></script> <!-- Light Gallery Plugin Js -->

@yield('page_js')
@stack('stack_js')
<script>
    $(function() {
        @if (session('success'))
            toastr["success"]("{{ session('success') }}", "Success");
        @elseif(session('error'))
            toastr["error"]("{{ session('error') }}", "Error");
        @elseif(session('warning'))
            toastr["warning"]("{{ session('warning') }}", "Warning");
        @endif
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    });

    $(function () {
        $('#aniimated-thumbnials').lightGallery({
            thumbnail: true,
            selector: 'a'
        });
    });
</script>

</body>

</html>
