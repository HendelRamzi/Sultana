@extends('layouts.website')


@push("custom-css")
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

@vite(['resources/css/product/style.css'])

@endpush

@push('page-title')
    Shopping Cart
@endpush

@push('livewire-css')
@livewireStyles
@endpush

@section('content')              

<section class="container">
    <div class="row">
        <div class=" navigation_header col-12 py-3 d-flex ">
            <a href="" class="">Home</a>
            <li href="" class="">Products</li>
            <li href="" class="current"> Contrasting Design T-shirt</li>
        </div>
    </div>
</section>


<section class="container" >
    <div class="row">
        <div class="col-12 col-md-6">
              <!-- Swiper -->
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{asset('images/1.jpg')}}" />
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('images/2.jpg')}}" />
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('images/3.jpg')}}" />
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <div thumbsSlider="" class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{asset('images/1.jpg')}}" />
                    </div>

                    <div class="swiper-slide">
                        <img src="{{asset('images/2.jpg')}}" />
                    </div>

                    <div class="swiper-slide">
                        <img src="{{asset('images/3.jpg')}}" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3 col-md-6 mt-lg-0">
            <div class="row d-md-flex justify-content-end">
                <div class="col-12 col-md-10">

                    
                    <div class="product__header_info d-flex flex-column gap-3 mb-2">
                        <div class="mb-2">
                            <span class="info">1 Review</span>
                            <h2>Contrasting Design T-Shirt</h2>
                            <span class="info">SKU: AB1609456789</span>
                        </div>
                        <h4 class="">£95.90</h4>
                        <div class="ps-product__desc">
                            <p style="max-width: 45ch; color: #777777; ">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        </div>
                    </div>



                    <div class="row product__shopping mb-5">
                        <div class="col-12 d-flex flex-column flex-lg-row justify-content-center justify-content-lg-around mb-2">
                            <div class="quantity d-flex justify-content-start ">
                                <input type="button" value="-" class="minus" >
                                <input type="text" name="quantity" value="1" class="qty" />
                                <input type="button" value="+" class="plus" >
                            </div>
                            <a href="" id="add_cart" class="button outline mt-3 mt-lg-0" >
                                Ajouter au panier
                            </a>
                        </div>

                        <div class="col-12 mt-2">
                            <a href="" class="button button-black" style=" padding: .75rem 0px ;  width: 100%; text-align: center;  font-weight: 200">
                                Acheter maintenant    
                            </a>
                        </div>


                    </div>



                    <div class="ps-product__specification py-4" style="border-top: black solid 1px">
                        <p class="category">
                            <strong>CATEGORY:</strong>
                            <a href="shop-4-column.html" class="info">Women</a>
                            <a href="shop-4-column.html" class="info">Top,</a>
                            <a href="shop-4-column.html" class="info">Accessories,</a>
                            <a href="shop-4-column.html" class="info">Jewellery</a>
                        </p>
                        <p class="tags">
                            <strong>TAGS:</strong>
                            <a href="shop-4-column.html" class="info">clothing,</a>
                            <a href="shop-4-column.html" class="info">t-shirt,</a>
                            <a href="shop-4-column.html" class="info">woman</a>
                        </p>
                    </div>


                    <div class="social__media">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>
                        </a>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                            </svg>
                        </a>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                                <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/>
                            </svg>
                        </a>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pinterest" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0z"/>
                            </svg>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>

{{-- Products description and reviews --}}
<section class="container pt-50" style="padding-top: 6.25rem">
    <div class="row">
        <ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist"
            style="
                border-top: 1px solid #eaeaea; 
                border-bottom: 1px solid #eaeaea; 
                padding : 1.25rem 0px ; 
            "
        >
            <li class="nav-item" role="presentation">
              <button class="nav-link active desc_btn" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                Description
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link desc_btn" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                Avis (2)
              </button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">                      
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row" style="margin-top: 6.25rem">
                    <div class="col-12 col-md-6">
                        <h3 class="desc_title">Introduction</h3>
                        <p class="desc_para">
                            With ultralight, quality cotton canvas, the JanSport Houston backpack is ideal for a life-on-the-go. This backpack features premium faux leather bottom and trim details, padded 15 in laptop sleeve and tricot lined tablet sleeve
                        </p>
                        <h3 class="desc_title">Features</h3>
                        <ul class="desc_list">
                            <li class="desc_list-item">Fully padded back panel, web hauded handle</li>
                            <li class="desc_list-item" >Internal padded sleeve fits 15″ laptop & unique fabric application</li>
                            <li class="desc_list-item">Internal tricot lined tablet sleeve</li>
                            <li class="desc_list-item">One large main compartment and zippered</li>
                            <li class="desc_list-item">Premium cotton canvas fabric</li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class=" px-2 px-md-5">
                            <img class="img-fluid" src="{{asset('images/3.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                {{-- Make Livewire component to Make the commentaire form functionnal --}}
                <div class="row">
                    <div class="col-12" id="review_section" >
                        <h4 class="review_title">
                            1 review for Contrasting Design T-Shirt
                        </h4>
                        <div class="d-flex commentaire_container" >
                            <div class="profile_pic">
                                <img src="{{asset('images/4.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="profile_details">
                                <h5>
                                    <span class="profil_name">Martine Katrine</span>
                                     - 
                                    <span class="com_date">04/07/2023</span> 
                                </h5>
                                <div class="review_content">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur 
                                        adipisicing elit. Ullam cumque, temporibus 
                                        vel doloremque totam omnis suscipit earum modi 
                                        ad voluptate, repellendus et iusto tempora 
                                        reiciendis dolores at ratione, eaque autem aspernatur velit consequuntur facere qui commodi exercitationem? Eius sed eaque dolores harum 
                                        quas saepe at eum officia similique. Alias, id!
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex commentaire_container" >
                            <div class="profile_pic">
                                <img src="{{asset('images/4.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="profile_details">
                                <h5>
                                    <span class="profil_name">Martine Katrine</span>
                                     - 
                                    <span class="com_date">04/07/2023</span> 
                                </h5>
                                <div class="review_content">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur 
                                        adipisicing elit. Ullam cumque, temporibus 
                                        vel doloremque totam omnis suscipit earum modi 
                                        ad voluptate, repellendus et iusto tempora 
                                        reiciendis dolores at ratione, eaque autem aspernatur velit consequuntur facere qui commodi exercitationem? Eius sed eaque dolores harum 
                                        quas saepe at eum officia similique. Alias, id!
                                    </p>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                    <div class="col-12 " style="padding-top: 50px">
                        <h5>Ajoutez votre avis</h5 >
                        <span>Your email address will not be published. Required fields are marked *</span>
                        <form action="" class="row mt-3">
                            <div class="col-12 form-group">
                                <label for="shipping-form-message">Votre message:</label>
                                <textarea class="form-control" placeholder="Ecrivez votre avis ici" id="shipping-form-message" name="shipping-form-message" rows="6"></textarea>
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <label for="billing-form-name">Nom:</label>
                                
                                <input type="text" placeholder="Entez votre nom" id="billing-form-name" name="billing-form-name" value="" class="form-control" />

                            </div>
                            <div class="col-md-6 form-group  mt-3">
                                <label for="billing-form-email">Email Adresse:</label>
                                <input type="email" placeholder="Entrez votre email" id="billing-form-email" name="billing-form-email" value="" class="form-control" />
                            </div>

                            <div class="col-md-6 form-group  mt-3">
                                <a href="#" wire:click="placeOrder" class="button button-3d button-black">Ajouter le commentaire</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="container" style="padding: 9.375rem 0px; ">
    <h2 class="text-center" style="margin-bottom: 2.5rem">Related Products</h2>
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
    </div>
</section>


@endsection


@push('js')
@livewireScripts

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


@endpush