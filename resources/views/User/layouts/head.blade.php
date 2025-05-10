{{-- <head> --}}
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Beacon Engineering')</title>
    <meta name="description" content="Beacon Engineering">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="shortcut icon" type="image/x-icon" href="asset/img/favicon.png"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/dist/img/title.ico') }}">
    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
{{-- </head> --}}
