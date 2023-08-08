@extends('layouts.website')


@push("custom-css")
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
@vite(['resources/css/checkout-page.css'])
@endpush



@push('page-title')
    Confirmation.
@endpush

@push('livewire-css')
@livewireStyles
@endpush

@section('content')                  
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
                <h1>Merci pour votre commande.</h1>
                <h3>Nous vous contacterons bientot, pour confirmer la livraison.</h3>
                <p>Order n°: {{$order->code}}</p>
                <a href="{{route('website.home')}}">Retourner a la boutique</a>
            </div>
        </div>
    </div>
@endsection


@push('livewire-js')
@livewireScripts
@endpush