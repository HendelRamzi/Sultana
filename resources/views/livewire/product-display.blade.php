<div class="container">
    <div class="row">
        <div class="col-12 col-md-3 order-2 order-md-1">
            <div class="row">
                <aside class=" aside_container col-12">
                    <h3 class="aside_heading">Nos collections de produits</h3>
                    <div class=" aside_content d-flex flex-column gap-1">
                        @foreach ($collections as $collection)
                            <a href="{{route('website.collection', ['name' => $collection->name])}}" class="aside_link" wire:key="{{$collection->id}}">{{$collection->name}}</a>  
                        @endforeach

                    </div>
                </aside>
                <aside class=" aside_container col-12">
                    <h3 class="aside_heading">Categories</h3>
                    <div class=" aside_content d-flex flex-column gap-1">
                        @foreach ($categories as $category)
                        <a href="{{route('website.collection.category', ['name' => $category->name])}}" class="aside_link" wire:key="{{$category->id}}"> {{ $category->name }} </a>
                        @endforeach
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
                    <h2 class="category_big_title">La Liste de nos produits</h2>
                    <div class="d-flex gap-2">
                        <span class="product_number">{{count($products)}}</span><p> Produits trouvés</p>
                    </div>
                </div>

                <div class="col-12" style="margin-bottom: 50px">
                    <h4 class="search_title">Chercher des produits</h4>
                    <div class="row">
                        <div class="col-4">
                            <p class="category_search">Par Category</p>
                            <select class="form-control" wire:model="categoryName">
                                <option value="" selected>Selectionnez une category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->name}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                </div>


                <div class=" products_list col-12">
                    <div class="row gx-4" >

                        @foreach ($products as $product)
                        <div class=" product col-12 col-md-6 col-lg-4" data-aos="fade-up"  >
                            <div class="d-flex flex-column gap-2 " style="position: relative">
                                <div class="image-product">
                                    <img class="image-top img-fuild" src="{{asset('storage/products/gallery/'. $product->gallery[0]->folder."/".$product->gallery[0]->image)}}" alt="">
                                    @if (count($product->gallery) > 1)
                                        <img class="image-hidden " src="{{asset('storage/products/gallery/'. $product->gallery[1]->folder."/".$product->gallery[1]->image)}}" alt="">    
                                    @else
                                        <img class="image-hidden " src="{{asset('storage/products/gallery/'. $product->gallery[0]->folder."/".$product->gallery[0]->image)}}" alt="">
                                    @endif
                                    <div class="product__actions">
                                        <a style="cursor: pointer" wire:click="addToCart({{$product}})">Add to cart</a>
                                    </div>
                                </div>
                                <div class="details-product">
                                    <h5 class="text-center text-lg-start" style="font-family: 'Arimo', sans-serif; text-transform: uppercase; cursor: pointer;" wire:click="gotoProduct({{$product->id}})"> {{ $product->name }} </h5>
                                    <span class="text-center text-lg-start"
                                        style="color: #f68773;
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
                </div>
            </div>
        </div>  
    </div>
</div>