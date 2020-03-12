<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Barroco Admin">

    <title>:: Admin Login ::</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/css/main.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/css/authentication.css">
</head>

<body class="theme-cyan authentication sidebar-collapse">
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url({{ asset('admin') }}/images/login.jpg)"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form class="form" method="POST" action="{!! route('admin.login') !!}">
                    @csrf
                    <div class="header">
                        <div class="img-fluid mb-4">
                            <img src="{{ asset('admin') }}/logo.svg" alt="">
                        </div>
                        <h5>Log in</h5>
                    </div>
                    <div class="content">
                        <div class="input-group input-lg">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter User Name" value="{{ old('email') }}">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group input-lg">
                            <input type="password" placeholder="Password" name="password" class="form-control @error('password') is-invalid @enderror" />
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                        @if ($errors->has('email') || $errors->has('password') || Session::has('error'))
                        <div class="alert alert-danger">
                            <strong>{{ Session::get('error') }}</strong>
                            <strong>{{ $errors->first('email') }}</strong>
                            <br>
                            @error('password')
                            <strong>{{ $errors->first('password') }}</strong>
                            @enderror
                        </div>
                        @endif
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light">SIGN IN</button>
                        <h6 class="m-t-20"><a href="#" class="link">Forgot Password?</a></h6>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- Jquery Core Js -->
<script src="{{ asset('admin') }}/bundles/libscripts.bundle.js"></script>
<script src="{{ asset('admin') }}/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script>
    $(".navbar-toggler").on('click',function() {
        $("html").toggleClass("nav-open");
    });
    //=============================================================================
    $('.form-control').on("focus", function() {
        $(this).parent('.input-group').addClass("input-group-focus");
    }).on("blur", function() {
        $(this).parent(".input-group").removeClass("input-group-focus");
    });
</script>
</body>

</html>
