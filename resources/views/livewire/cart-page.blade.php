<div id="wrapper">
    <!-- Page Title
    ============================================= -->
    <section id="page-title">

        <div class="container">
            <h1>Panier</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('website.home')}}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Nos produits</a></li>
                <li class="breadcrumb-item active" aria-current="page">Panier</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    

    <!-- Content
    ============================================= -->
    <section id="content" style="margin-top: 100px;">
        <div class="content-wrap">
            <div class="container">

                <div class="table-responsive mb-2">
                    <table class="table cart">
                        <thead>
                            <tr>
                                <th class="cart-product-remove">&nbsp;</th>
                                <th class="cart-product-thumbnail">&nbsp;</th>
                                <th class="cart-product-name">Product</th>
                                <th class="cart-product-price">Unit Price</th>
                                <th class="cart-product-quantity">Quantity</th>
                                <th class="cart-product-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $i => $product)
                                <tr class="cart_item" wire:key="{{$i}}">
                                    <td class="cart-product-remove">
                                        <a href="#" class="remove" title="Remove this item" wire:click="deleteItem('{{$i}}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                            </svg>
                                        </a>
                                    </td>
                                    <td class="cart-product-thumbnail">
                                        <a href="{{route('products.show', ['product' => $product['id']])}}"><img width="64" height="64" src="{{asset($product['options']['imageURL'])}}" alt="Pink Printed Dress"></a>
                                    </td>
                                    <td class="cart-product-name">
                                        <a href="{{route('products.show', ['product' => $product['id']])}}"> {{$product['name']}} </a>
                                    </td>
                                    <td class="cart-product-price">
                                        <span class="amount">{{ $product['price'] }} da</span>
                                    </td>
                                    <td class="cart-product-quantity">
                                        <div class="quantity">
                                            <span  class="minus" wire:click="removeQty('{{$i}}')">-</span>
                                            <input type="text" name="quantity" value="{{ $products[$i]['qty'] }}" wire:model="products.{{ $i }}.qty" class="qty" />
                                            <input type="button" value="+" class="plus" wire:click="addQty('{{$i}}')">
                                        </div>
                                    </td>
                                    <td class="cart-product-subtotal">
                                        <span class="amount">{{ $this->totalProduit($product['qty'], $product['price']) }} da</span>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="cart_item">
                                <td colspan="6" style="border: none !important">
                                    <div class="row">
                                        <div class="col-lg-8 col-8 p-0">
                                            <a href="{{route('products.index')}}" class="button-secondary  mt-2 ">Ajouter produits</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>

                <div class="row col-mb-30">
                    <div class="col-lg-6 ms-auto">
                        <h4>Total du panier</h4>
                        <div class="table-responsive">
                            <table class="table cart">
                                <tbody>
                                    <tr class="cart_item">
                                        <td class="cart-product-name">
                                            <strong>Total</strong>
                                        </td>

                                        <td class="cart-product-name">
                                            <span class="amount color lead"><strong> {{$this->totalCount()}} da </strong></span>
                                        </td>
                                    </tr>
                                    <tr class="cart_item">
                                        <td class="cart-product-name" style="border: none !important; ">
                                            @if(count($products) >= 1)
                                                <a wire:click="goToCheckout" class="button button-3d button-black m-0" style="color: white !important;"> Passer à la caisse </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </section><!-- #content end -->


</div><!-- #wrapper end -->