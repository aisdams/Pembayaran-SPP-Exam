<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Auth User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('template/assets/images/icon/favicon.ico')}}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/slicknav.min.css')}}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{ asset('template/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="{{ asset('template/')}}http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    @yield('content')
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="{{ asset('template/assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('template/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('template/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('template/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('template/assets/js/metisMenu.min.js')}}"></script>
    <script src="{{ asset('template/assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{ asset('template/assets/js/jquery.slicknav.min.js')}}"></script>
    
    <!-- others plugins -->
    <script src="{{ asset('template/assets/js/plugins.js')}}"></script>
    <script src="{{ asset('template/assets/js/scripts.js')}}"></script>
</body>

</html>