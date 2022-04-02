<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ url()->current() }}" />

    @yield('meta')

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="flex flex-col min-h-screen">
<x-website.header />

<main class="flex-grow">

{{ $slot }}

</main>

<x-website.footer />


<x-website.scroll-back-up />


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://unpkg.com/alpinejs@3.9.1/dist/cdn.min.js" defer></script>
@once @stack('highlight.js') @endonce

</body>
</html>
