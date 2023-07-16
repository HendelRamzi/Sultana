@extends('layouts.app')

@push('title')
Home
@endpush




@push('custom-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    @vite(['resources/css/home.css'])
    @vite(['resources/css/footer/style.css'])
    @vite(['resources/css/header.css'])
@endpush


{{-- @push('header')
    @include('layouts.header')
@endpush --}}


@section('content')

{{-- Place the header --}}
@livewire('header2')


<section class=" home__banner">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper " >

                @isset($banner_products)
                    @foreach ($banner_products as $product)
                        <div class=" swiper-slide" style="background-color: #E4E4E4">
                            <div class="row container">
                                <div class="col-12 col-lg-6 banner_content" >
                                    <span>{{ $product->categories[0]->name }}</span>
                                    <h1>{{ $product->name }}</h1>
                                    <p>{{$product->short_desc}}</p>
                                    <a href="{{route('products.show', ['product' => $product->id])}}">Consulter maintenant</a>
                                </div>
                                <div class=" col-12 col-lg-6 d-flex justify-content-start align-items-center ">
                                    <div class="image_content" >
                                        <img class="banner-image" style="object-fit: contain !important; " src="{{asset('storage/products/thumbnail/'.$product->folder."/".$product->thumb)}}" alt=""
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach ($products as $product)
                        <div class=" swiper-slide" style="background-color: #E4E4E4">
                            <div class="row container">
                                <div class="col-12 col-lg-6 banner_content" >
                                    <span>{{ $product->categories[0]->name }}</span>
                                    <h1>{{ $product->name }}</h1>
                                    <p>{{$product->short_desc}}</p>
                                    <a href="{{route('products.show', ['product' => $product->id])}}">Consulter maintenant</a>
                                </div>
                                <div class=" col-12 col-lg-6 d-flex justify-content-start align-items-center ">
                                    <div class="image_content" style="padding: 1rem !important;">
                                        <img class="banner-image" style="object-fit: contain !important;" src="{{asset('storage/products/thumbnail/'.$product->folder."/".$product->thumb)}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endisset   
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>




<section class="container familly-products">
    
    <div class="row" style="padding-bottom: 80px">
        <div class="col-12" >
            <h2 class="" style="
                font-family: 'Dancing Script', cursive;
                font-size: 3rem;
            ">
                Descouvrez notre gamme <br>de produits
            </h2>
        </div>
    </div>
    
    {{-- @if (count($collections[0]?->categories[0]?->products) > 0) --}}
        <div class="row" style="padding-bottom: 200px">
            <div class="col-3" >
                <div class="small-thumb">
                    <div class="action-overlay">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="a_container">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <img src="{{asset('images/home__01.png')}}"  data-aos="fade-up-right" data-aos-anchor-placement="bottom-bottom" data-aos-duration="800">
                </div>
            </div>
            <div class="col-12 col-lg-9" style="position: relative">
                <div class="thumbnel" style="justify-content: end">
                    <img class="" src="{{asset('images/home__01.png')}}" data-aos="fade-up-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                </div>
                <div class="text-content" style="top: 0; left: 80px;">
                    {{-- <span data-aos="fade-up" data-aos-delay="100">{{$collections[0]->name}} collection</span> --}}
                    <h3 data-aos="fade-up" data-aos-delay="300">Home Collection</h3>
                    <p data-aos="fade-up" data-aos-delay="500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, cum.</p>
                    <a data-aos="fade-up" href="{{route('website.collection', ['name' => $collections[0]->name])}}" data-aos-delay="700">Explorer la collection</a>
                </div>
            </div>
        </div>
    {{-- @endif --}}


        <div class="row"  style="padding-bottom: 200px">
            <div class="col-12 col-lg-9" style="position: relative">
                <div class="thumbnel" style="justify-content: start">
                    <img class="img-fluid" src="{{asset('images/home__02.png')}}" data-aos="fade-up-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                </div>
                <div class="text-content" style="top: -50px; right: 80px;">
                    {{-- <span>{{$collections[1]->name}} collection</span> --}}
                    <h3 data-aos="fade-up" data-aos-delay="300" style="max-width: 10ch">Perfect body</h3>
                    <p data-aos="fade-up" data-aos-delay="500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, tenetur.</p>
                    <a href="{{route('website.collection', ['name' => $collections[1]->name])}}" data-aos="fade-up" data-aos-delay="700">Explorer la collection</a>
                </div>
            </div>
            <div class="col-3">
                <div class="small-thumb">
                    <div class="action-overlay">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="a_container">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <img src="{{asset('images/home__02.png')}}"  data-aos="fade-up-right" data-aos-anchor-placement="bottom-bottom" data-aos-duration="800" >
                </div>
            </div>
        </div>

        <div class="row" style="padding-bottom: 200px">
            <div class="col-3" >
                <div class="small-thumb">
                    <div class="action-overlay">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="a_container">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <img src="{{asset("images/home__08.png")}}"  data-aos="fade-up-right" data-aos-anchor-placement="bottom-bottom" data-aos-duration="800">
                </div>
            </div>
            <div class="col-12 col-lg-9" style="position: relative">
                <div class="thumbnel" style="justify-content: end">
                    <img class="img-fluid" src="{{asset("images/home__08.png")}}"  data-aos="fade-up-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                </div>
                <div class="text-content" style="top: 0; left: 80px;">
                    {{-- <span data-aos="fade-up" data-aos-delay="100">{{$collections[2]->name}} collection</span> --}}
                    <h3 data-aos="fade-up" data-aos-delay="300">Intimité Collection</h3>
                    <p data-aos="fade-up" data-aos-delay="500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, eligendi!</p>
                    <a data-aos="fade-up" href="{{route('website.collection', ['name' => $collections[2]->name])}}" data-aos-delay="700">Explorer la collection</a>
                </div>
            </div>
        </div>


</section>

{{-- 

<section class="container-fluid best_sellers">
    <div class="row row-no-padding ">
        <div class="col-12 text-center fp-header d-flex flex-column align-items-center">
            <h2>Decouvrez nos Best Sellers du moment</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, dolores eius aspernatur molestiae incidunt iusto.</p>
        </div>


        <div class="col-12" style="margin: 0 !important; padding: 0 !important;">
            
            <div class="row row-no-padding" style="height: 100vh; overflow: hidden;">
                <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-center gap-3" style="height: 100%; margin: 0 !important; padding: 0 !important;">
                    <h2 
                        style="
                            color: #A06D7D;
                            font-weight: 700;
                        "
                    >BEAUTIFUL DESIGN</h2>
                    <span
                        style="font-size: 14px;
                            color: #777
                        "
                    >CREATIVE SOLUTIONS.</span>
                    <p 
                        style="text-align: center;
                            max-width: 60ch; 
                            line-height: 1.5rem; 
                        "
                    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ipsam distinctio accusamus accusantium quibusdam iste rerum recusandae repudiandae. At, reprehenderit doloremque. Debitis nemo voluptatum magni adipisci? Provident impedit voluptate pariatur, iure aliquid, atque numquam architecto ex officia laborum labore doloribus explicabo? Debitis recusandae inventore repudiandae porro sunt, dicta est nemo?</p>
                    <a href="">
                        Commandez le produit maintenant !
                    </a>
                </div>
                <div class="col-12 col-lg-6" style="height: 100vh margin: 0 !important; padding: 0 !important;">
                    <div class="d-flex justify-content-center align-items-center" style="width: 100%; height: 100%;
                        background-color: #A06D7D ; 
                    ">
                        <img class="img-fluid" src="{{asset('images/bn__01.png')}}" alt="">
                    </div>
                </div>
            </div>

            <div class="row row-no-padding  " style="height: 100vh; overflow: hidden;">
                <div class="col-12 col-lg-6" style="height: 100vh margin: 0 !important; padding: 0 !important;">
                    <div class="d-flex justify-content-center align-items-center" style="width: 100%; height: 100%;
                    ">
                        <img class="img-fluid" src="{{asset('images/home__02.png')}}" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-center gap-3" style="height: 100%; margin: 0 !important; padding: 0 !important;">
                    <h2 
                        style="
                            color: #222;
                            font-weight: 700;
                        "
                    >BEAUTIFUL DESIGN</h2>
                    <span
                        style="font-size: 14px;
                            color: #777
                        "
                    >CREATIVE SOLUTIONS.</span>
                    <p 
                        style="text-align: center;
                            max-width: 60ch; 
                            line-height: 1.5rem; 
                        "
                    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ipsam distinctio accusamus accusantium quibusdam iste rerum recusandae repudiandae. At, reprehenderit doloremque. Debitis nemo voluptatum magni adipisci? Provident impedit voluptate pariatur, iure aliquid, atque numquam architecto ex officia laborum labore doloribus explicabo? Debitis recusandae inventore repudiandae porro sunt, dicta est nemo?</p>
                    <a href="">
                        Commandez le produit maintenant !
                    </a>
                </div>
            </div>


        </div>
    </div>
</section> --}}



<section class="container-fluid" style="padding-bottom: 100px;">   
    <div class="row how_section" style="padding: 180px 0px 180px 0px; ">
        <div class="col-12 d-flex flex-column align-items-center how_content">
            <h2 data-aos="fade-up" data-aos-delay="00" data-aos-duration="1000" > Ce qui nous rend <br>special</h2>
            <p data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis dignissimos, minus voluptate quae rem corporis doloribus fuga commodi molestias accusantium.</p>
        </div>
        <div class="col-12">
            <div class="row container mx-auto" style="background-color: white"  data-aos="zoom-in-up" data-aos-duration="1000">
                <div class="col-4 service_content" data-aos="fade-right" data-aos-delay="500" data-aos-duration="2000">
                    <h3>STRATEGY + INTENTION</h3>
                    <p>Even with 20 years of experience creating websites, I continue to educate myself every month to stay on top of the strategies that make money online.</p>
                </div>


                <div class="col-4 service_content" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="2000">
                    <h3>
                        NO-TOUCH TECH SUPPORT
                    </h3>
                    <p>
                        Being a business owner doesn't mean you have to do it all. I'm more than happy to take over the launch tech to let you focus on what you do best!
                    </p>
                </div>


                <div class="col-4 service_content" data-aos="fade-left" data-aos-delay="1500" data-aos-duration="2000">
                    <h3>
                        HEART-CENTERED EDUCATION
                    </h3>
                    <p>
                        We all define success in our own way. My goal is to help anyone who comes into contact with December Oak walk away more joyful and confident.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- <section class="container valeur__section" style="position: relative; padding-bottom: 70px">
    <div class="row">
        <div class="col-6 pt-5 valeur_content">
            <h3>
                Nos valeurs
            </h3>
            <p data-aos="fade-right" data-aos-delay="100" data-aos-duration="2000">
                Chez Sultana, notre valeur clé est l'authenticité. Sultana est avant tout une question de passion. Nous proposons des produits authentiques qui répondent aux besoins individuels de nos clients.
            </p>
            <p data-aos="fade-right" data-aos-delay="400" data-aos-duration="2000">
                L'intégrité est une valeur fondamentale chez Sultana. Nous nous engageons à fournir des produits de haute qualité, en privilégiant des ingrédients naturels et respectueux de l'environnement. Chez Sultana, nous cultivons la passion pour la beauté authentique et responsable.
            </p>
        </div>
        <div class="col-6">
            <div class="valeur-img">
                <img src="{{asset('images/ab__05.jpg')}}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section> --}}


@if(count($products) >= 1)
    
    <section class="container products-list">
        <div class="row" style="padding-bottom: 80px">
            <div class="col-12" >
                <h2 class="" style="
                    font-family: 'Dancing Script', cursive;
                    font-size: 3rem
                ">
                    Explorez nos produits <br>de qualité
                </h2>
            </div>
        </div>
        <div class="row">

            @livewire('product-home', [
                'products' => $products
            ])



        </div> 
    </section>

@endif


<section class="container subscribe-section">
    <div class="row">
        <div class="col-12 col-md-6">
            <h2 style="
                font-size: 1.75rem ;
                font-weight: 700;

            "
            >Restez connectés</h2>
            <p style="
                font-size: 1rem; color: #777 ; 
            ">Ne manquer aucun de nos dernier produits</p>
        </div>
        <div class="col-12 col-md-6">
            <div class="d-flex w-100 justify-content-between py-3"
                style="border-bottom: 1px solid #b1b1b1"
            >
                <input type="text" name="" style="border:none ; font-size: 1rem ; color: #777; width:100%; " placeholder="Enter your email">
                <button
                    style="background: none; border: none; font-weight: 700;
                        font-size: 14px;
                    "
                >SUBSCRIBE</button>
            </div>
        </div>
    </div>
</section>



@include('layouts.footer')

@endsection


@push('custom-js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop : true,
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

<script type="module">
    // Add JavaScript code here
    window.addEventListener('scroll', function() {
        var header = document.querySelector('.sticky-header');
        header.classList.toggle('scrolled', window.scrollY > 700);
    });
</script>

@endpush