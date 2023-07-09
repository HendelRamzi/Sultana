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

    @stack('custom-css')

    @stack('livewire-css')
    @vite(['resources/sass/app.scss','resources/js/index.jsx'])
</head>
<body>

    @yield('content')


    @stack('js')
</body>
</html>