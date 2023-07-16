@extends('layouts.app')


@push("custom-css")
    @vite(["resources/css/contact/style.css"])
    @vite(["resources/css/footer/style.css"])
@endpush




@push('title')
Contactez-nous
@endpush

{{-- 

@push('header')
    @include('layouts.header2')
@endpush --}}

@section('content')        


@livewire('header')


<section class="container-fluid banner__section">
    <div class="row">
        <div class="col-12 banner__content">
            <div class="content">
                <h1>Contact</h1>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="{{route('website.home')}}">Accueil</a><li class="active">Contact</li>
                </div>
            </div>
        </div>  
    </div>
</section>



{{-- Put in livewire container --}}
@livewire('contact-form')

@include('layouts.footer')
@endsection



@push('custom-js')
<script type="module">
    // Add JavaScript code here
    window.addEventListener('scroll', function() {
        var header = document.querySelector('.sticky-header');
        header.classList.toggle('scrolled', window.scrollY > 0);
    });
</script>
@endpush
