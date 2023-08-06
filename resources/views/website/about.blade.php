@extends('layouts.app')


@push("custom-css")
    @vite(["resources/css/about/style.css"])
    @vite(["resources/css/footer/style.css"])
@endpush




@push('title')
Qui est Sultana ?
@endpush





@section('content')

@livewire('header')


    <section class="container" style="position: relative; padding-bottom: 100px; ">
        <div class="row">
            <div class="col-12 col-md-6 about-content" style="padding-top: 80px; ">
                <h3 data-aos="fade-up" data-aos-delay="100" data-aos-duration="2000">Qui est Soltana ?</h3>
                <p data-aos="fade-up" data-aos-delay="300" data-aos-duration="2000">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem omnis iste aliquid, blanditiis modi officia corporis dolores tempora cum, ipsum fugit unde consequuntur architecto a! Dolor soluta mollitia quaerat pariatur.</p>
                <p data-aos="fade-up" data-aos-delay="600" data-aos-duration="2000">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas quaerat reiciendis consequuntur adipisci sed aliquam eos laborum quasi necessitatibus doloribus voluptate consectetur, atque eligendi sequi in dolor error at repellendus?</p>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-start" data-aos="fade-left" data-aos-duration="2000">
                <div class="ab-about_image">
                    <img src="{{asset('images/ab__04.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <img class="bg-img d-none  d-lg-block" src="{{asset('images/flower.png')}}" alt="">
    </section>


    <section class="container-fluid" >   
        <div class="row how_section" style="padding: 180px 0px 180px 0px; ">
            <div class="col-12 d-flex flex-column align-items-center how_content">
                <h2 data-aos="fade-up" data-aos-delay="00" data-aos-duration="1000" > Ce qui nous rend <br>special</h2>
                <p data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                    Nous proposons des produits naturels de qualité et nous mettons l’accent sur le Bio.
                    Nous prenons soin de choisir pour vous une gamme de produit à la hauteur de nos
                    engagements et nous nous rapprochons de plus prêt de nos clients.
                </p>
            </div>
            <div class="col-12">
                <div class="row container mx-auto" style="background-color: white"  data-aos="zoom-in-up" data-aos-duration="1000">
                    <div class="col-12 col-md-4 service_content" data-aos="fade-right" data-aos-delay="500" data-aos-duration="2000">
                        {{-- <h3>STRATEGY + INTENTION</h3> --}}
                        <p>Notre marque est spécialisée dans le Bio et propose des produits sains et respectueux
                            de l’environnement.</p>
                    </div>
    
    
                    <div class="col-12 col-md-4 service_content" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="2000">
                        {{-- <h3>
                            NO-TOUCH TECH SUPPORT
                        </h3> --}}
                        <p>
                            Nous nous engageons à partager tous nos conseils et notre savoir faire sur le bien-être
                            car nous nous soucions de votre santé mentale et physique.
                        </p>
                    </div>
    
    
                    <div class="col-12 col-md-4 service_content" data-aos="fade-left" data-aos-delay="1500" data-aos-duration="2000">
                        {{-- <h3>
                            HEART-CENTERED EDUCATION
                        </h3> --}}
                        <p>
                            Nous partageons avec vous nos années d’expérience et nous sommes à l’écoute de vos
                            attentes pour répondre au mieux à vos besoins.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="container valeur__section" style="position: relative; padding-bottom: 70px; ">
        <div class="row">
            <div class="col-12 col-lg-6 pt-lg-5 valeur_content">
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
            <div class="col-12 col-lg-6">
                <div class="valeur-img  ">
                    <img src="{{asset('images/ab__05.jpg')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid cta__section">
        <div class="row">
            <div class="col-12 d-flex flex-column align-items-center cta_content">
                <h2>Soiyez Les Bienvenu Chez <br> Sotana Store</h2>
                <p>
                    Découvrez notre gamme de produits de beauté inspirants et laissez-vous séduire par une expérience unique de soin et de bien-être
                </p>
                <p>
                    Explorez dès maintenant nos produits et trouvez ceux qui sauront révéler votre beauté naturelle.
                </p>
                <a href="{{route('products.index')}}" class="button outline">
                    Allez Explorer ! 
                </a>
            </div>
        </div>
    </section>


    @include('layouts.footer')

@endsection



@push('custom-js')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endpush
