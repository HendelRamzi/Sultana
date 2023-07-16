<div class="row">
    <div class="col-12 col-md-3 order-2 order-md-1">
        <div class="row">
            <aside class=" aside_container col-12">
                <h3 class="aside_heading">Famille de produits</h3>
                <div class=" aside_content d-flex flex-column gap-1">
                    @foreach ($collections as $col)
                        <a href="{{route('website.collection', ['name' => $col->name])}}" class="aside_link">{{$col->name}}</a>        
                    @endforeach
                </div>
            </aside>
            <aside class=" aside_container col-12">
                <h3 class="aside_heading">Categories</h3>
                <div class=" aside_content d-flex flex-column gap-1">
                    @foreach ($collection->categories as $cat)
                    <a href="{{route('website.collection.category', ['name' => $cat->name])}}" class="aside_link">{{$cat->name}}</a>
                    @endforeach
                </div>
            </aside>
        </div>
    </div>



    <div class=" products_wrapper col-12 col-md-9 order-1 order-md-2">
        <div class="row">


            <div class="products_header section_spacing col-12 d-flex">
                <a href="{{route('website.home')}}">Home </a><li href="" class="current">Collection</li>
            </div>


            <div class="products_manipulation section_spacing col-12">
                <h2 class="category_big_title">{{$collection->name}}</h2>
                <div class="d-flex gap-2">
                    <span class="product_number">{{$this->productCount()}}</span><p> Produits trouvés</p>
                </div>
            </div>
            <div class=" products_list col-12">
                <div class="row gx-4">

                    @foreach ($collection->categories as $cat)
                        @foreach ($cat->products as $product)        
                            <div class=" product col-6 col-md-6 col-lg-4">
                                <div class="d-flex flex-column gap-2 " style="position: relative">
                                    <div class="image-product">
                                        <img class="image-top img-fuild" src="{{asset('storage/products/gallery/'.$product->gallery[0]->folder."/".$product->gallery[0]->image   )}}" alt="">
                                        <img class="image-hidden " src="{{asset('storage/products/gallery/'.$product->gallery[1]->folder."/".$product->gallery[1]->image   )}}" alt="">
                                        <div class="product__actions" style="cursor: pointer">
                                            <a wire:click="addToCart({{$product}})"> Ajouter au panier</a>
                                        </div>
                                    </div>
                                    <div class="details-product">
                                        <h5 class="text-center text-lg-start">
                                            <a style="text-decoration: none; color: black;" href="{{route('products.show', ['product' => $product->id])}}">{{ $product->name }}</a>
                                        </h5>
                                        <span class="text-center text-lg-start"
                                            style="color: #f68773;
                                                font-weight: 500;
                                            "
                                        >
                                        {{ $product->price }} da
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
           
                </div>
            </div>
        </div>
    </div>  
</div>