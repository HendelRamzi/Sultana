<section class="container" style="padding: 9.375rem 0px; ">
    <h2 class="text-center" style="margin-bottom: 2.5rem">Related Products</h2>
    <div class="row g-3 ">

        @foreach ($products as $product)
        @if ($prod->id != $product->id)
        <div class="col-12 col-md-6 col-lg-3">
            <div class="d-flex flex-column gap-2 " style="position: relative">
                <div class="image-product">
                    <img class="image-top" src="{{asset("storage/products/gallery/".$product->gallery[0]->folder."/".$product->gallery[0]->image)}}" alt="">
                    @if (count($product->gallery) > 1)
                        <img class="image-hidden " src="{{asset("storage/products/gallery/".$product->gallery[1]->folder."/".$product->gallery[1]->image)}}"  alt="">
                    @else
                        <img class="image-hidden " src="{{asset("storage/products/gallery/".$product->gallery[0]->folder."/".$product->gallery[0]->image)}}"  alt="">
                    @endif
                    <div class="product__actions">
                        <a href=""> Add to cart</a>
                    </div>
                </div>
                <div class="details-product">
                    <h5 class="text-center text-lg-start">
                        <a   style="text-decoration: none; color:black"  href="{{route('products.show', ['product'=> $product->id])}}">{{$product->name}}</a>
                    </h5>
                    <span class="text-center text-lg-start" style="color: #f68773; font-size: 12px ; font-weight: bold; text-transform: uppercase">
                        {{$product->categories[0]->name}}
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
        @endif
        @endforeach




    </div>
</section>