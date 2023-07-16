<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard - @stack("title") </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
    @vite(["resources/js/admin/plugins/fontawesome-free/css/all.css"])

    @stack('custom-css')

    {{-- Load boostrap and Jquery --}}
    @vite(['resources/js/index.jsx'])

    {{-- Load adminLTE styles --}}
    @vite(["resources/js/admin/css/adminlte.css"])





</head>
<body>
    

    {{-- Here will go the header --}}
    @include('admin.layout.header')
    
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @yield('content')
    </div>



    
   

    
    @stack('custom-js')



    

</body>
</html>