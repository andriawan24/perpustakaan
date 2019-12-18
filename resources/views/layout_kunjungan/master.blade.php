<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    {{-- Icon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/smkn2.png') }}">

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Zilla+Slab&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lacquer&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/all.css') }}">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/home/style.css') }}" >
    <link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}">

    {{-- Scripts --}}
    <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.js') }}" ></script>
    <script src="{{ asset('vendors/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>


    {{-- Scripts --}}
</head>
<body>
    @include("layout_kunjungan.alert")

    @yield('content')

    @stack('js')
</body>
</html>