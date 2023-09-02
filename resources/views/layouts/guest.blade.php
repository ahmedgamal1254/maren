<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
        <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/plugins/animate/animate.css")}}">
        <!-- BEGIN VENDOR CSS-->
        <link href="{{asset("assets/css-rtl/vendors.css")}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ asset("assets/vendors/css/weather-icons/climacons.min.css")}}">
        <link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/core/menu/menu-types/vertical-menu.css")}}">
        <!-- END VENDOR CSS-->
        <!-- BEGIN MODERN CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/app.css")}}">
        <link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/custom-rtl.css")}}">
        <!-- END MODERN CSS-->

        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/style-rtl.css")}}">
        <!-- END Custom CSS-->

        <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="{{ asset("assets/css/toastr.css") }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
        <!-- Scripts -->
        <script src="{{ asset("assets/js/all.min.js") }}"></script>
        <link rel="stylesheet" href="{{ asset("assets/css/all.css") }}">
        <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}">
        <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">

    </head>
    <body class="font-sans text-gray-900 antialiased">
        @yield('login')
        <script src="{{ asset("assets/js/bootstrap.bundle.min.js") }}"></script>
        <script src="{{ asset("assets/js/script.js") }}"></script>
    </body>
</html>
