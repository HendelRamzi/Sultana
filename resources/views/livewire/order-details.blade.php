


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div>
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
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div >
                            <h5>Informations sur le  client</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h6 style="font-weight: bold">Nom du client</h6>
                                <p>
                                    {{ $client->nom." ".$client->prenom }}
                                </p>
                            </div>
                            <div class="col-6">
                                <h6 style="font-weight: bold">adress</h6>
                                <p>
                                    {{ $client->adress }}
                                </p>
                            </div>
                            <div class="col-6">
                                <h6 style="font-weight: bold">Ville</h6>
                                <p>
                                    {{ $client->ville }}
                                </p>
                            </div>
                            <div class="col-6">
                                <h6 style="font-weight: bold">Commune</h6>
                                <p>
                                    {{ $client->commune->nom }}
                                </p>
                            </div>
                            <div class="col-6">
                                <h6 style="font-weight: bold">Email</h6>
                                <p>
                                    {{ $client->email }}
                                </p>
                            </div>
                            <div class="col-6">
                                <h6 style="font-weight: bold">numéro de telephone</h6>
                                <p>
                                    {{ $client->phone }}
                                </p>
                            </div>
                        </div>                    
                    </div>
                    <div class="card-footer">
                        <a href="{{route('admin.clients.details', ['id'=> $client->id])}}" class="btn btn-primary">
                            Consulter le client
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Informations sur la commande</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h6 style="font-weight: bold">Code de la commande</h6>
                                <p>
                                    {{ $order->code }}
                                </p>
                            </div>
                            <div class="col-6">
                                <h6 style="font-weight: bold">Date de création</h6>
                                <p>
                                    {{ $order->created_at }}
                                </p>
                            </div>
                            <div class="col-6">
                                <h6 style="font-weight: bold">Status de la commande</h6>
                                <p>
                                    @if($order->status->name == "placer")
                                        <td>  
                                            <span class="badge bg-info text-dark">
                                                {{ $order->status->name }}
                                            </span>
                                        </td>
                                    @endif
                                    @if($order->status->name == "en cours")
                                        <td>  
                                            <span class="badge bg-primary text-dark">
                                                {{ $order->status->name }}
                                            </span>
                                        </td>
                                    @endif
                                    @if($order->status->name == "retour")
                                        <td>  
                                            <span class="badge bg-danger text-dark">
                                                {{ $order->status->name }}
                                            </span>
                                        </td>
                                    @endif
                                    @if($order->status->name == "terminer")
                                        <td>  
                                            <span class="badge bg-success text-dark">
                                                {{ $order->status->name }}
                                            </span>
                                        </td>
                                    @endif
                                </p>
                            </div>
                            <div class="col-6">
                                <h6 style="font-weight: bold">La commune de destination</h6>
                                <p>
                                    {{ $order->commune->nom }}
                                </p>
                            </div>
                            <div class="col-6">
                                <h6 style="font-weight: bold">Frai de livraison</h6>
                                <p>
                                    {{ $order->frai_livraison }} da
                                </p>
                            </div>
                            <div class="col-6">
                                <h6 style="font-weight: bold">Type de livraison</h6>
                                <p>
                                    {{ $order->type_livraison }}
                                </p>
                            </div>
                            <div class="col-6">
                                <h6 style="font-weight: bold">Montant de la commande</h6>
                                <p>
                                    {{ $this->calcTotal() }} da
                                </p>
                            </div>
                            <div class="col-12">
                                <h6 style="font-weight: bold">Remarque du client</h6>
                                @if($order->remarque)
                                    <textarea class="form-control" disabled>{{$order->remarque}}</textarea>
                                @else
                                    <textarea class="form-control" disabled>Pas de remarque. </textarea>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#statusChange">
                            Changer le status
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header d-flex ">
                        <div >
                            <h5>Produits de la commande ({{count($products)}}) </h5>
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
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr wire:key="{{ "product_".$product->id }}">
                                <td>
                                    <label for="{{ $product->id }}" class="d-flex justify-content-center align-items-center">
                                        <div class="mr-4" style="width: 50px; height: 50px;">
                                            <img class="img-fluid" src="{{asset('storage/products/thumbnail/'.$product->folder."/".$product->thumb)}}" alt="">
                                        </div>
                                        <div class="" style="max-width: 10ch; text-align: center">
                                            <a>{{ $product->name }}</a>
                                        </div>
                                    </label>
                                </td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->categories[0]->name }}</td>
                                <td>{{ $product->price }} da</td>
                                <td>{{ $product->qty }}</td>
                                <td> {{ ($product->qty * $product->price). " da" }} </td>
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

<div class="modal fade" id="statusChange" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    wire:ignore
>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Changer le status</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="">
                Selectionnez le nouveau status
            </label>
            <select class="form-control" wire:model="order.status_id">
                {{-- <option value="{{ $order->status->id }}" selected>
                    {{ $order->status->name }}
                </option> --}}
                @foreach ($status as $st)
                    <option value="{{$st->id}}" wire:key="{{$order->id}}">
                        {{$st->name}}
                    </option>
                @endforeach
              </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" wire:click="updateState" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>



</div>



</section>


