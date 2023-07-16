@extends('layouts.website')


@push("custom-css")
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

@vite(['resources/css/product/list.css'])
@vite(['resources/css/footer/style.css'])
@vite(['resources/css/header2.css'])

@endpush

@push('page-title')
    Liste des produits
@endpush

@push('livewire-css')
@livewireStyles
@endpush

@section('content')  

@livewire('header')

<section class="shopping_products" style="padding-top: 100px">
    @livewire('product-display')
</section>


@include('layouts.footer')

@endsection


@push('livewire-js')
@livewireScripts

@endpush


@push('custom-js')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endpush