@extends('layouts.website')


@push("custom-css")
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

@vite(['resources/css/product/list.css'])

@endpush

@push('page-title')
    Liste des produits
@endpush

@push('livewire-css')
@livewireStyles
@endpush

@section('content')   
<section class="shopping_products" style="padding-top: 100px">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 order-2 order-md-1">
                <div class="row">
                    <aside class=" aside_container col-12">
                        <h3 class="aside_heading">Famille de produits</h3>
                        <div class=" aside_content d-flex flex-column gap-1">
                            <a href="" class="aside_link">Home</a>
                            <a href="" class="aside_link">Intimité</a>
                            <a href="" class="aside_link">Perfect body</a>
                        </div>
                    </aside>
                    <aside class=" aside_container col-12">
                        <h3 class="aside_heading">Categories</h3>
                        <div class=" aside_content d-flex flex-column gap-1">
                            <a href="" class="aside_link">Category 01</a>
                            <a href="" class="aside_link">Category 02</a>
                            <a href="" class="aside_link">Category 03</a>
                            <a href="" class="aside_link">Category 04</a>
                            <a href="" class="aside_link">Category 05</a>

                        </div>
                    </aside>
                    <aside class=" aside_container col-12">
                        <h3 class="aside_heading">Best Sellers</h3>
                        <div class=" aside_content d-flex flex-column gap-1">
                        </div>
                    </aside>
                </div>
            </div>
            <div class=" products_wrapper col-12 col-md-9 order-1 order-md-2">
                <div class="row">


                    <div class="products_header section_spacing col-12 d-flex">
                        <a href="">Home </a><li href="" class="current">Magazin</li>
                    </div>


                    <div class="products_manipulation section_spacing col-12">
                        <h2 class="category_big_title">Perfect body</h2>
                        <div class="d-flex gap-2">
                            <span class="product_number">5</span><p> Produits trouvés</p>
                        </div>
                    </div>


                    <div class=" products_list col-12">
                        <div class="row gx-4">

                            <div class=" product col-6 col-md-6 col-lg-4">
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
                                        <span class="text-center text-lg-start"
                                            style="color: #f68773;
                                                font-weight: 500;
                                            "
                                        >
                                            £ 9,90
                                        </span>
                                    </div>
                                </div>
                            </div>
                                                
                            <div class=" product col-6 col-md-6 col-lg-4">
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

                                        <span class="text-center text-lg-start"
                                            style="color: #f68773;
                                                font-weight: 500;
                                            "
                                        >
                                            £ 9,90
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class=" product col-6 col-md-6 col-lg-4">
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

                                        <span class="text-center text-lg-start"
                                            style="color: #f68773;
                                                font-weight: 500;
                                            "
                                        >
                                            £ 9,90
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class=" product col-6 col-md-6 col-lg-4">
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

                                        <span class="text-center text-lg-start"
                                            style="color: #f68773;
                                                font-weight: 500;
                                                
                                            "
                                        >
                                            £ 9,90
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class=" product col-6 col-md-6 col-lg-4">
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

                                        <span class="text-center text-lg-start"
                                            style="color: #f68773;
                                                font-weight: 500;
                                            "
                                        >
                                            £ 9,90
                                        </span>
                                    </div>
                                </div>
                            </div>
                    
                        </div>
                    </div>

                    <div class="products_footer col-12 text-center">
                        <button>Voir plus de produits</button>
                    </div>

                </div>
            </div>  
        </div>
    </div>
</section>
@endsection


@push('js')
@livewireScripts

@endpush