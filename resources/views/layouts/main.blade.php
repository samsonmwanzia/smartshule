<?php
    $admin = (new \App\Http\Controllers\AdminController())->loggedIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ env("APP_NAME") }} | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content>

    <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">

</head>
<body>

<div id="app" class="app">

    <div id="header" class="app-header">

        <div class="mobile-toggler">
            <button type="button" class="menu-toggler" data-toggle="sidebar-mobile">
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>


        <div class="brand">
            <div class="desktop-toggler">
                <button type="button" class="menu-toggler" data-toggle="sidebar-minify">
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>
            </div>
            <a href="index-2.html" class="brand-logo">
                <img src="{{ asset('assets/img/logo.png') }}" class="invert-dark" alt height="20">
            </a>
        </div>


        @include('admin.incs.notifications')

    </div>


    @include('admin.incs.aside')

    @yield('content')

    <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

</div>


<script src="{{ asset('assets/js/vendor.min.js') }}" type="504547e9567d0ca300b47f18-text/javascript"></script>
<script src="{{ asset('assets/js/app.min.js') }}" type="504547e9567d0ca300b47f18-text/javascript"></script>


<script src="{{ asset('assets/plugins/apexcharts/dist/apexcharts.min.js') }}" type="504547e9567d0ca300b47f18-text/javascript"></script>
<script src="{{ asset('assets/js/demo/dashboard.demo.js') }}" type="504547e9567d0ca300b47f18-text/javascript"></script>

<script src="{{ asset('assets/js/loader.js') }}" data-cf-settings="504547e9567d0ca300b47f18-|49" defer></script>
<script defer src="{{ asset('assets/js/beacon.js') }}"></script>
@include('sweetalert::alert')

</body>
</html>
