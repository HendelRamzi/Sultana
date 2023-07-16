@extends('layouts.website')


@push("custom-css")
@vite(['resources/css/cart-page.css'])
@vite(['resources/css/header2.css'])

@endpush

@push('page-title')
    Shopping Cart
@endpush

@push('livewire-css')
@livewireStyles
@endpush

@section('content')       
    @livewire('header')           
    @livewire('cart-page')
@endsection


@push('livewire-js')
@livewireScripts



<script type="module">
    // Add JavaScript code here
    window.addEventListener('scroll', function() {
        var header = document.querySelector('.sticky-header');
        header.classList.toggle('scrolled', window.scrollY > 0);
});
</script>
@endpush