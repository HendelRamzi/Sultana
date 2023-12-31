<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sultana - @stack('title')</title>

    <style>
        body{
            background-color: #F5F5F5 !important;
        }
    </style>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    
    {{-- Plugins style import --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    
    
    @stack('custom-css')
    
    @livewireStyles

    @vite([ "resources/css/header.css",])

    @vite(['resources/sass/app.scss', 'resources/js/index.jsx'])
</head>
<body>
    <div id="app">
        <main >

            {{-- Include de header --}}
            @stack('header')


            @yield('content')
        </main>
    </div>

    @livewireScripts
    @stack('custom-js')
</body>
</html>
    