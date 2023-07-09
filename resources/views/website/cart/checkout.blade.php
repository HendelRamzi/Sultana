@extends('layouts.website')


@push("custom-css")
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
@vite(['resources/css/checkout-page.css'])
@endpush

@push('page-title')
    Checkout
@endpush

@push('livewire-css')
@livewireStyles
@endpush

@section('content')                  
    @livewire('checkout-page')
@endsection


@push('js')
@livewireScripts
@endpush