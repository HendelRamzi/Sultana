@extends('layouts.website')


@push("custom-css")
@vite(['resources/css/cart-page.css'])

@endpush

@push('page-title')
    Shopping Cart
@endpush

@push('livewire-css')
@livewireStyles
@endpush

@section('content')                  
    @livewire('cart-page')
@endsection


@push('js')
@livewireScripts
@endpush