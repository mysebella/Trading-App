<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="hsbforextr.pro" />
    <meta name="description" content="HSB FOREX TRADE" />
    <meta name="keywords" content="HSB FOREX TRADE" />
    <title>Login - HSB FOREX TRADE</title>
    <link href="{{ asset('') }}landing-page/images/banner/favicon_cca1b9442d3fee8271ec1d949c711916.png"
        rel="SHORTCUT ICON" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('') }}login/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('') }}login/css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="{{ asset('') }}login/font/flaticon.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('') }}login/style.css" />
</head>

<body style="background-image: url(https://hsbglobaltrade.com/logintheme/img/figure/bg28-l.jpg);">
    @yield('content')

    <script src="{{ asset('') }}login/js/jquery-3.5.0.min.js"></script>
    <script src="{{ asset('') }}login/js/popper.min.js"></script>
    <script src="{{ asset('') }}login/js/bootstrap.min.js"></script>
    <script src="{{ asset('') }}login/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('') }}login/js/particles.js"></script>
    <script src="{{ asset('') }}login/js/particles-1.js"></script>
    <script src="{{ asset('') }}login/js/validator.min.js"></script>
    <script src="{{ asset('') }}login/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('') }}login/script.js"></script>
    @yield('javascript')
</body>

</html>
