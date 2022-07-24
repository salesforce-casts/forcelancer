<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{--  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">  --}}
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link href='https://fonts.googleapis.com/css?family=Mulish' rel='stylesheet'>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="https://unpkg.com/vue@next"></script>

    {{--  @yield('css')  --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{ $scripts ?? '' }}

    {{ $css ?? '' }}

</head>

<body>

    @include('layouts.navigation')
        <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</body>
<x-footer></x-footer>
</html>
