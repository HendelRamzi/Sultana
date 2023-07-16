<div>
    <div class="col-12">
        <div class="row g-3 ">

            @foreach ($products as $product)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex flex-column gap-2 " style="position: relative">
                        <div class="image-product">
                            <img class="image-top img-fuild" src="{{asset('storage/products/gallery/'.$product->gallery[0]->folder."/".$product->gallery[0]->image)}}" alt="">
                            <img class="image-hidden " src="{{asset('storage/products/gallery/'.$product->gallery[1]->folder."/".$product->gallery[1]->image)}}" alt="">
                            <div class="product__actions">
                                <a wire:click="addToCart({{$product}})" style="cursor: pointer"> Add to cart</a>
                            </div>
                        </div>
                        <div class="details-product">
                            <h5 class="text-center text-lg-start">
                                <a href="{{route('products.show', ['product' => $product->id])}}"
                                        style="text-decoration: none; color: black"
                                    >{{$product->name}}</a>
                            </h5>
                            <span class="text-center text-lg-start" style="color: #f68773; font-size: 12px ; font-weight: bold; text-transform: uppercase">
                                <a style="text-decoration: none; color: #f68773" href="{{route('website.collection.category', ['name' => $product->categories[0]->name  ])}}">{{ $product->categories[0]->name }}</a>
                            </span>
                            <span class="text-center text-lg-start"
                                style="color: #999;
                                    font-weight: 500;
                                "
                            >
                                {{$product->price}} da
                            </span>
                        </div>
                    </div>
                </div>                  
            @endforeach

        </div>

        <div class="products_footer col-12 text-center">
            <a href="{{route("products.index")}}">Voir plus de produits</a>
        </div>
    </div>

</div>
