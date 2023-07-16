<header class="sticky-header">
    <nav class="navbar navbar-expand-lg">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('website.home')}}">accueil</a>
          </li>
            <div class=" nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Nos Collections
                </a>
              
                <ul class="dropdown-menu" style="">
                  @foreach ($collections as $collection)
                    <li><a class="dropdown-item" href="{{route('website.collection', ["name" => $collection->name])}}">{{$collection->name}}</a></li>
                  @endforeach
                </ul>
            </div>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('products.index')}}">Nos produits</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('website.about')}}">Qui somme-nous</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('website.contact')}}">Contact</a>
            </li>
        </ul>



        <ul class="navbar-nav ms-auto">



            <li class="nav-item ">
                <div class="nav-link" wire:click="goToCart" style="cursor: pointer">
                  @if (count($cart) > 0 )
                      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </svg>
                        <span>({{count($cart)}})</span>
                  @else
                      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </svg>
                  @endif
                </div>
            </li>
        </ul>

          
      </div>
    </nav>
</header>


