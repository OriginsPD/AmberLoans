<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/scroll.css') }}">
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.4/css/pro.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body class="h-screen antialiased leading-none font-sans ">

<div
    class="relative text-white  bg-center bg-no-repeat bg-cover"
    style="background-image: url(https://cdn.pixabay.com/photo/2016/08/19/10/20/money-1604921_960_720.jpg); height: 100vh "
    role="banner">

    <div class="bg-green-600 absolute bg-opacity-75 z-10 h-screen w-screen" style="height: 100vh"></div>


    @if(!request()->routeIs('login'))

    @livewire('navigation.home.index-navi')

    @endif

    @yield('content')

</div>


@if(!request()->routeIs('login'))

    <div class="bg-white">

        @livewire('home.product-page')

    </div>

@endif



<!-- Footer End of Body -->
@livewireScripts
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
