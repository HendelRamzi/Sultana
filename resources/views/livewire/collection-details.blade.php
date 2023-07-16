<!-- Main content -->
<section class="content">

    <div class="container-fluid">
        <div class="row">
            <!-- general form elements -->
            @if (session()->has('processSuccess'))
                <div id="feedback" class="alert alert-success col-16">
                    {{ session('processSuccess') }}
                </div>
            @endif
            @if (session()->has('processError'))
                <div id="feedback" class="alert alert-danger col-16">
                    {{ session('processError') }}
                </div>
            @endif

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Collection informations
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="">Nom de la collection</label>
                                <p>
                                    {{$collection->name}}
                                </p>
                            </div>
                            <div class="col-12">
                                <label for="">Description de la collection</label>
                                <p>
                                    {{$collection->desc}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updatecat">
                            Modifier les informations
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card card-danger">
                    <div class="card-header">
                        <h5>Supression de la Collection</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label class="text-danger" for="">Attention</label>
                                <p>
                                    Pour des raisons de sécurité. Une collection ne peut etre supprimée que si tout les categories associer sont detruits.
                                </p>
                            </div>
                        </div>
                    </div>
                    @if(count($collection->categories) <= 0)
                        <div class="card-footer">
                            <button class="btn btn-sm rounded btn-danger" data-bs-toggle="modal" data-bs-target="#deletecat">
                                Supprimer la collection
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="py-3">
                    <span class="badge bg-primary">Resultat ({{count($categories)}})</span>
                    <span class="badge bg-secondary">selected (0)</span>
                </div>
                <div class="card">
                    <div class="card-header d-flex ">
                        <div class="">
                            <input class="form-control" type="text" placeholder="Chercher une categorie">
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
                                <th>Nombre de produits</th>
                                <th class="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $cat)
                                <tr wire:key="{{$cat->id}}">
                                    <td><input type="checkbox" id="{{'cat_'.$cat->id}}"></td>
                                    <td><label for="{{"cat_".$cat->id}}" style="cursor: pointer">{{$cat->name}}</label></td>
                                    <td>{{count($cat->products)}} produits</td>
                                    <td>
                                        <div class="dropdown">
                                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="action" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="action">
                                            <li><a class="dropdown-item" href="{{route('admin.categories.details', ['id'=> $cat->id])}}">Consulter</a></li>
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

    <div class="modal fade" id="updatecat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            </div>
            <div class="modal-body">
                <label for="cat_name">Nom de la categorie</label>
                <input type="text" id="cat_name" class="form-control" wire:model.defer="collection.name">
                <label for="cat_desc">Nom de la categorie</label>
                <input type="text" id="cat_desc" class="form-control" wire:model.defer="collection.desc">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" wire:click="updateCollection" class="btn btn-primary">Modifier</button>
            </div>
          </div>
        </div>
      </div>


    <div class="modal modal-danger fade" id="deletecat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Supprestion de la collection</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              Etre vous sure de vouloir supprimer cette collection ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
              <button type="button" wire:click="deleteCollection" class="btn btn-danger">Oui</button>
              
            </div>
          </div>
        </div>
      </div>
</section>

    
