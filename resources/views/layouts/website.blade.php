<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.O" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
       Sultana - @stack('page-title')
    </title>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- @livewireStyles --}}


    @stack('custom-css')

    @stack('livewire-css')
    @vite(['resources/sass/app.scss','resources/js/index.jsx'])
</head>
<body>


    {{-- Include de header --}}
    @stack('header')

    @yield('content')


    @stack('livewire-js')
    @stack('custom-js')

    {{-- @livewireScripts --}}
</body>
</html>