<section class="content">
    <div class="container-fluid">

        @if(session()->has("processSuccess"))
            <div class="col-12 py-2 px-4 alert alert-success" role="alert">
                {{ session()->get('processSuccess') }}
            </div>
        @endif

        @if(session()->has("processError"))
            <div class=" col-12 py-2 px-4 alert alert-danger" role="alert">
                {{ session()->get('processSuccess') }}
            </div>
        @endif


        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Category informations</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Name</label>
                                <p>{{ $cat->name }}</p>
                            </div>
                            <div class="col-6">
                                <label for="">Collection</label>
                                <p>
                                    <a style="color: black; font-weight: bold; cursor: pointer;" href="{{route('admin.collections.details', ['id' => $cat->collection->id ])}}">{{ $cat->collection->name }}</a>
                                </p>
                            </div>
                            <div class="col-12">
                                <label for="">Description</label>
                                <p>
                                    {{$cat->desc}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updatecat">
                            modifier les informations
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card card-danger">
                    <div class="card-header">
                        <h5>Supression de la category</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label class="text-danger" for="">Attention</label>
                                <p >La suppression de la category va engendrer la suppression de tous les produits qui lui sont associer. </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm rounded btn-danger" data-bs-toggle="modal" data-bs-target="#deletecat">
                            Supprimer la categorie
                        </button>
                    </div>
                </div>
            </div>
        </div>

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
                                <th>Nom</th>
                                <th>code</th>
                                <th>Categorie</th>
                                <th>price</th>
                                <th>Qty</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr wire:key="{{ "product_".$product->id }}">
                                <td><label for="{{ $product->id }}" class="d-flex justify-content-center align-items-center">
                                    <div class="mr-4" style="width: 50px; height: 50px;">
                                        <img class="img-fluid" src="{{asset('storage/products/thumbnail/'.$product->folder."/".$product->thumb)}}" alt="">
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
                                    @if ($product->published == 1)
                                        <span class="badge bg-success">Publier</span>
                                    @else
                                        <span class="badge bg-warning">draft</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="action" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="action">
                                        <li><a class="dropdown-item" href="#">Consulter</a></li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="updatecat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        </div>
        <div class="modal-body">
            <label for="cat_name">Nom de la categorie</label>
            <input type="text" id="cat_name" class="form-control" wire:model.defer="cat.name">
            <label for="cat_desc">Description de la categorie</label>
            <input type="text" id="cat_desc" class="form-control" wire:model.defer="cat.desc">
            <label for="cat_collection">Selectionnez la collection</label>
            <select wire:model.defer="cat.collection_id" id="cat_collection" class="form-control">
                @foreach ($collections as $c)
                    <option value="{{$c->id}}" wire:key="{{$c->id}}"> {{$c->name}} </option>
                @endforeach
            </select>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" wire:click="updateCategory" class="btn btn-primary">Modifier</button>
        </div>
      </div>
    </div>
  </div>
  





    <div class="modal modal-danger fade" id="deletecat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              Etre vous sure de vouloir supprimer cette categorie ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
              <button type="button" wire:click="deleteCategorie" class="btn btn-danger">Oui</button>
              
            </div>
          </div>
        </div>
      </div>
</section>
