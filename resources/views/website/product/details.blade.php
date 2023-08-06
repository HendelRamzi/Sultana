@extends('layouts.website')


@push("custom-css")
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

@vite(['resources/css/product/style.css'])
@vite(['resources/css/footer/style.css'])

@endpush

@push('page-title')
    Shopping Cart
@endpush

{{-- @push('header')
    @include('layouts.header2')
@endpush --}}



@push('livewire-css')
@livewireStyles
@endpush



@section('content')         


@livewire('header')


<section class="container" style="padding-top: 50px">
    <div class="row">
        <div class=" navigation_header col-12 py-3 d-flex ">
            <a href="" class="">Home</a>
            <li href="" class="">Products</li>
            <li href="" class="current"> Contrasting Design T-shirt</li>
        </div>
    </div>
</section>


<section class="container" >
    @livewire('product-cart', ['product' => $product])
</section>

{{-- Products description and reviews --}}
<section class="container pt-50" style="padding-top: 6.25rem">
    @livewire('product-description', ['product' => $product])
</section>



{{-- Put in livewire componenet --}}
@livewire('product-related', ['prod' => $product])



@include('layouts.footer')

@endsection


@push('custom-js')
@livewireScripts


<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.3/dist/cdn.min.js"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      loop: true,
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
      loop: true,
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });
  </script>

<script type="module">
    // Add JavaScript code here
    window.addEventListener('scroll', function() {
        var header = document.querySelector('.sticky-header');
        header.classList.toggle('scrolled', window.scrollY > 0);
    });
</script>


@endpush