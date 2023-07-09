@extends('layouts.app')

@push('custom-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    @vite(['resources/css/home.css'])
@endpush

@section('content')


<header class="container-fluid">
    <div class="row" >
        <div class="col-12 d-none d-lg-flex justify-content-center py-3"
            style="background-color: #E4E4E4"
        >
            Sultana
        </div>
    </div>
</header>
<header class="sticky-header">
    <nav class="navbar navbar-expand-lg">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ">
          <li class="nav-item active">
            <a class="nav-link" href="#">accueil</a>
          </li>
            <div class=" nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Nos Collections
                </a>
              
                <ul class="dropdown-menu" style="">
                  <li><a class="dropdown-item" href="#">Home</a></li>
                  <li><a class="dropdown-item" href="#">Intimité</a></li>
                  <li><a class="dropdown-item" href="#">Perfect body</a></li>
                </ul>
            </div>
            <li class="nav-item ">
                <a class="nav-link" href="#">Nos produits</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Qui somme-nous</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>



        <ul class="navbar-nav ms-auto">



            <li class="nav-item ">
                <div class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                   
                </div>
            </li>
        </ul>

          
      </div>
    </nav>
</header>




<section class=" home__banner" >
    <div class="swiper mySwiper">
        <div class="swiper-wrapper " >
            <div class=" swiper-slide" style="background-color: #E4E4E4">
                <div class="row container">
                    <div class="col-12 col-lg-6 banner_content" >
                        <span>Best Seller</span>
                        <h1>Brume de linge</h1>
                        <p>Bring distinctive design to your home with this Small Toiletpaper lampshade.</p>
                        <button>SHOP NOW</button>
                    </div>
                    <div class=" col-12 col-lg-6 d-flex justify-content-center align-items-center ">
                        <div class="image_content">
                            <img class="banner-image" src="{{asset('images/nb__01.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class=" swiper-slide" style="background-color: #E4E4E4">
                <div class="row">
                    <div class="col-12 col-lg-6 banner_content">
                        <span>Best Seller</span>
                        <h1>Musk Blanc</h1>
                        <p>Bring distinctive design to your home with this Small Toiletpaper lampshade.</p>
                        <button>SHOP NOW</button>
                    </div>
                    <div class=" col-12 col-lg-6">
                        <div class="image_content">
                            <img class="banner-image" src="{{asset('images/nb__02.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
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
                        <div class="a_container">
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
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
                <img class="img-fluid" src="{{asset('images/home__05.png')}}" data-aos="fade-up-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
            </div>
            <div class="text-content" style="top: 0; left: 80px;">
                <span data-aos="fade-up" data-aos-delay="100">Home collection</span>
                <h3 data-aos="fade-up" data-aos-delay="300">Brume de <br>linge</h3>
                <p data-aos="fade-up" data-aos-delay="500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa, inventore!</p>
                <a data-aos="fade-up" href="" data-aos-delay="700">Explorer la collection</a>
            </div>
        </div>
    </div>


    <div class="row"  style="padding-bottom: 200px">
        <div class="col-12 col-lg-9" style="position: relative">
            <div class="thumbnel" style="justify-content: start">
                <img class="img-fluid" src="{{asset('images/home__02.png')}}" data-aos="fade-up-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
            </div>
            <div class="text-content" style="top: -50px; right: 80px;">
                <span>Perfect body</span>
                <h3 data-aos="fade-up" data-aos-delay="300">Tisane <br>minceur</h3>
                <p data-aos="fade-up" data-aos-delay="500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa, inventore!</p>
                <a data-aos="fade-up" data-aos-delay="700">Explorer la collection</a>
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
                        <div class="a_container">
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <img src="{{asset('images/home__07.png')}}"  data-aos="fade-up-right" data-aos-anchor-placement="bottom-bottom" data-aos-duration="800" >
            </div>
        </div>
    </div>


    <div class="row" style="padding-bottom: 100px">
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
                        <div class="a_container">
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <img src="{{asset('images/home__08.png')}}" alt="" data-aos="fade-up-right" data-aos-anchor-placement="bottom-bottom" data-aos-duration="800">
            </div>
        </div>
        <div class="col-12 col-lg-9" style="position: relative">
            <div class="thumbnel" style="justify-content: end">
                <img class="img-fluid" src="{{asset('images/home__06.png')}}" alt="" data-aos="fade-up-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
            </div>
            <div class="text-content" style="top: 0; left: 80px;">
                <span data-aos="fade-up" data-aos-delay="100">Intimité Collection</span>
                <h3 data-aos="fade-up" data-aos-delay="300">Musk Blanc</h3>
                <p data-aos="fade-up" data-aos-delay="500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa, inventore!</p>
                <a href="" data-aos="fade-up" data-aos-delay="700">Explorer la collection</a>
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

        <div class="col-12">
            <div class="row g-3 ">


                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex flex-column gap-2 " style="position: relative">
                        <div class="image-product">
                            <img class="image-top img-fuild" src="{{asset('images/22.jpg')}}" alt="">
                            <img class="image-hidden " src="{{asset('images/2-h.jpg')}}" alt="">
                            <div class="product__actions">
                                <a href=""> Add to cart</a>
                            </div>
                        </div>
                        <div class="details-product">
                            <h5 class="text-center text-lg-start">Aviator Sunglasses</h5>
                            <span class="text-center text-lg-start" style="color: #f68773; font-size: 12px ; font-weight: bold; text-transform: uppercase">
                                Perfect Body
                            </span>
                            <span class="text-center text-lg-start"
                                style="color: #999;
                                    font-weight: 500;
                                "
                            >
                                £ 9,90
                            </span>
                        </div>
                    </div>
                </div>
        
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex flex-column gap-2 " style="position: relative">
                        <div class="image-product">
                            <img class="image-top img-fuild" src="{{asset('images/11.jpg')}}" alt="">
                            <img class="image-hidden " src="{{asset('images/1-h.jpg')}}" alt="">
                            <div class="product__actions">
                                <a href=""> Add to cart</a>
                            </div>
                        </div>
                        <div class="details-product">
                            <h5 class="text-center text-lg-start">Aviator Sunglasses</h5>
                            <span class="text-center text-lg-start" style="color: #f68773; font-size: 12px ; font-weight: bold; text-transform: uppercase">
                                Home
                            </span>
                            <span class="text-center text-lg-start"
                                style="color: #999;
                                    font-weight: 500;
                                "
                            >
                                £ 9,90
                            </span>
                        </div>
                    </div>
                </div>
        
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex flex-column gap-2 " style="position: relative">
                        <div class="image-product">
                            <img class="image-top img-fuild" src="{{asset('images/33.jpg')}}" alt="">
                            <img class="image-hidden " src="{{asset('images/3-h.jpg')}}" alt="">
                            <div class="product__actions">
                                <a href=""> Add to cart</a>
                            </div>
                        </div>
                        <div class="details-product">
                            <h5 class="text-center text-lg-start">Aviator Sunglasses</h5>
                            <span class="text-center text-lg-start" style="color: #f68773; font-size: 12px ; font-weight: bold; text-transform: uppercase">
                                Perfect Body
                            </span>
                            <span class="text-center text-lg-start"
                                style="color: #999;
                                    font-weight: 500;
                                "
                            >
                                £ 9,90
                            </span>
                        </div>
                    </div>
                </div>
        
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex flex-column gap-2 " style="position: relative">
                        <div class="image-product">
                            <img class="image-top img-fuild" src="{{asset('images/1.jpg')}}" alt="">
                            <img class="image-hidden " src="{{asset('images/2.jpg')}}" alt="">
                            <div class="product__actions">
                                <a href=""> Add to cart</a>
                            </div>
                        </div>
                        <div class="details-product">
                            <h5 class="text-center text-lg-start">Aviator Sunglasses</h5>
                            <span class="text-center text-lg-start" style="color: #f68773; font-size: 12px ; font-weight: bold; text-transform: uppercase ">
                                Intimité
                            </span>
                            <span class="text-center text-lg-start"
                                style="color: #999;
                                    font-weight: 500;
                                    
                                "
                            >
                                £ 9,90
                            </span>
                        </div>
                    </div>
                </div>

                        
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex flex-column gap-2 " style="position: relative">
                        <div class="image-product">
                            <img class="image-top img-fuild" src="{{asset('images/33.jpg')}}" alt="">
                            <img class="image-hidden " src="{{asset('images/3-h.jpg')}}" alt="">
                            <div class="product__actions">
                                <a href=""> Add to cart</a>
                            </div>
                        </div>
                        <div class="details-product">
                            <h5 class="text-center text-lg-start">Aviator Sunglasses</h5>
                            <span class="text-center text-lg-start" style="color: #f68773; font-size: 12px ; font-weight: bold; text-transform: uppercase">
                                Perfect Body
                            </span>
                            <span class="text-center text-lg-start"
                                style="color: #999;
                                    font-weight: 500;
                                "
                            >
                                £ 9,90
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex flex-column gap-2 " style="position: relative">
                        <div class="image-product">
                            <img class="image-top img-fuild" src="{{asset('images/22.jpg')}}" alt="">
                            <img class="image-hidden " src="{{asset('images/2-h.jpg')}}" alt="">
                            <div class="product__actions">
                                <a href=""> Add to cart</a>
                            </div>
                        </div>
                        <div class="details-product">
                            <h5 class="text-center text-lg-start">Aviator Sunglasses</h5>
                            <span class="text-center text-lg-start" style="color: #f68773; font-size: 12px ; font-weight: bold; text-transform: uppercase">
                                Perfect Body
                            </span>
                            <span class="text-center text-lg-start"
                                style="color: #999;
                                    font-weight: 500;
                                "
                            >
                                £ 9,90
                            </span>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex flex-column gap-2 " style="position: relative">
                        <div class="image-product">
                            <img class="image-top img-fuild" src="{{asset('images/1.jpg')}}" alt="">
                            <img class="image-hidden " src="{{asset('images/2.jpg')}}" alt="">
                            <div class="product__actions">
                                <a href=""> Add to cart</a>
                            </div>
                        </div>
                        <div class="details-product">
                            <h5 class="text-center text-lg-start">Aviator Sunglasses</h5>
                            <span class="text-center text-lg-start" style="color: #f68773; font-size: 12px ; font-weight: bold; text-transform: uppercase ">
                                Intimité
                            </span>
                            <span class="text-center text-lg-start"
                                style="color: #999;
                                    font-weight: 500;
                                    
                                "
                            >
                                £ 9,90
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex flex-column gap-2 " style="position: relative">
                        <div class="image-product">
                            <img class="image-top img-fuild" src="{{asset('images/11.jpg')}}" alt="">
                            <img class="image-hidden " src="{{asset('images/1-h.jpg')}}" alt="">
                            <div class="product__actions">
                                <a href=""> Add to cart</a>
                            </div>
                        </div>
                        <div class="details-product">
                            <h5 class="text-center text-lg-start">Aviator Sunglasses</h5>
                            <span class="text-center text-lg-start" style="color: #f68773; font-size: 12px ; font-weight: bold; text-transform: uppercase">
                                Home
                            </span>
                            <span class="text-center text-lg-start"
                                style="color: #999;
                                    font-weight: 500;
                                "
                            >
                                £ 9,90
                            </span>
                        </div>
                    </div>
                </div>


            </div>

            <div class="products_footer col-12 text-center">
                <button>Voir plus de produits</button>
            </div>
        </div>
    </div> 
</section>



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

<section class="container-fluid instagram_section">
    <div class="row row-no-padding">


        <div class="col-6 col-md-4 col-lg-2" style="margin: 0 !important; padding: 0px !important; position: relative;">
            <div class="instagram_overlay">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                </svg>
            </div>
            <img class="img-fluid" src="{{asset('images/1.jpg')}}" alt="">
        </div>


        <div class="col-6 col-md-4 col-lg-2" style="margin: 0 !important; padding: 0px !important; position: relative;">
            <div class="instagram_overlay">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                </svg>
            </div>
            <img class="img-fluid" src="{{asset('images/11.jpg')}}" alt="">
        </div>


        <div class="col-6 col-md-4 col-lg-2" style="margin: 0 !important; padding: 0px !important; position: relative;">
            <div class="instagram_overlay">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                </svg>
            </div>
            <img class="img-fluid" src="{{asset('images/22.jpg')}}" alt="">
        </div>


        <div class="col-6 col-md-4 col-lg-2" style="margin: 0 !important; padding: 0px !important; position: relative;">
            <div class="instagram_overlay">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                </svg>
            </div>
            <img class="img-fluid" src="{{asset('images/home__01.png')}}" alt="">
            
        </div>


        <div class="col-6 col-md-4 col-lg-2" style="margin: 0 !important; padding: 0px !important; position: relative;">
            <div class="instagram_overlay">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                </svg>
            </div>
            <img class="img-fluid" src="{{asset('images/home__02.png')}}" alt="">
            
        </div>


        <div class="col-6 col-md-4 col-lg-2" style="margin: 0 !important; padding: 0px !important; position: relative;">
            <div class="instagram_overlay">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                </svg>
            </div>
            <img class="img-fluid" src="{{asset('images/33.jpg')}}" alt="">
        </div>


    </div>
</section>


<section class="container-fluid footer_section">
    <div class="container">
        <div class="row">
            <div class="col-12" style="padding: 40px 0px">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <h3>Syltana Cosmetique</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque perferendis aliquam, quasi repudiandae nesciunt aliquid ducimus quo sapiente voluptatem distinctio! Sunt, nisi ipsa laboriosam quo ratione corporis mollitia qui delectus.
                        </p>
                        <button class="button outline button-black">Explorez nos gammes de produits</button>
                    </div>
                    <div class="col-12 col-md-3">
                        <h3>Lien Rapide</h3>
                        <ul>
                            <li>Produits</li>
                            <li>Qui est Sultana ?</li>
                            <li>Contact</li>
                            <li>FaQ</li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-3">
                        <h3>Lien Rapide</h3>
                        <ul>
                            <li>Produits</li>
                            <li>Qui est Sultana ?</li>
                            <li>Contact</li>
                            <li>FaQ</li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-3">
                        <h3>Contactez-nous</h3>
                        <ul>
                            <li>Adress domicile</li>
                            <li>address email</li>
                            <li>Numero de telephone</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-between"
                style="padding: 10px 0px"
            >
                <p>© Signature. All rights reserved 2023</p>
            </div>
        </div>
    </div>
</section>

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