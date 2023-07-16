<div>

   
<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        @if(session()->has("success"))
            <div class="col-12 py-2 px-4 alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif

        @if(session()->has("error"))
            <div class=" col-12 py-2 px-4 alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif


        <div class="row">
            <div class="col-12">
                <div class="py-3">
                    <span class="badge bg-primary">Resultat ( {{count($products)}} )</span>
                    <span class="badge bg-secondary">selected (0)</span>
                </div>
                <div class="card">
                    <div class="card-header d-flex ">
                        <div class="">
                            <input class="form-control" type="text" placeholder="Chercher un produit">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">
                                    <input type="checkbox">
                                </th>
                                <th>Nom</th>
                                <th>code</th>
                                <th>Categorie</th>
                                <th>price</th>
                                <th>Qty</th>
                                <th>Status</th>
                                <th>Avis</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr wire:key="{{ "product_".$product->id }}">
                                <td><input type="checkbox" id="{{ $product->id }}"></td>
                                <td><label for="{{ $product->id }}" class="d-flex justify-content-center align-items-center">
                                    <div class="mr-4" style="width: 50px; height: 50px;">
                                        <img class="img-fluid" style="max-width: 50px; aspect-ratio:1/1; object-fit: contain" src="{{asset('storage/products/thumbnail/'.$product->folder."/".$product->thumb)}}" alt="">
                                    </div>
                                    <div class="" style="max-width: 10ch; text-align: center">
                                        {{ $product->name }}
                                    </div>
                                </label></td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->categories[0]->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>
                                    <span class="badge bg-success">Publier</span>
                                </td>
                                <td>
                                    {{ count($product->avis) }} avis
                                </td>
                                <td>
                                    <div class="dropdown">
                                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="action" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="action">
                                        <li><a class="dropdown-item" href="{{route('admin.products.details', ['id' => $product->id])}}">Consulter</a></li>
                                        <li><a class="dropdown-item" href="{{route('admin.products.edit', ['name' => $product->name])}}">Modifier</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <form class="dropdown-item" method="POST" action="{{route('products.destroy', ['product' => $product->id])}}">
                                                @csrf
                                                @method("delete")
                                                <input type="submit" class="form-control btn btn-danger" value="Supprimer">
                                            </form>
                                        </li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</section>


</div>
