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
                                    {{ $client->commune }}
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
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div >
                            <h5>Suppression du client</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <p>
                                   Supprimer le client ainsi que toute les commandes <br>qui lui sont associer
                                </p>
                            </div>
                        </div>                    
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteClient">
                            Supprimer
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
                            <h5>liste des commandes du client 
                                ({{count($orders)}})
                            </h5>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table">
                        <thead>
                            <tr>
                                <th>code</th>
                                <th>stauts</th>
                                <th>products number</th>
                                <th>remarque</th>
                                <th>date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr wire:key="{{ "order_".$order->id }}">
                                <td>
                                    <label for="{{ $order->id }}" class="">
                                            <a href="{{route('admin.orders.details', ['id' => $order->id])}}">{{ $order->code }}</a>
                                    </label>
                                </td>
                                @if($order->status->name)
                                <td>
                                    <span class="badge bg-primary py-2">
                                        {{ $order->status->name }}
                                    </span>
                                </td>
                                @endif
                                <td>{{ count($order->products) }} products</td>
                                @if($order->remarque)
                                    <td>
                                        <span class="badge bg-warning py-2 px-4" data-bs-toggle="modal" data-bs-target="#showMessage" style="cursor: pointer">
                                            yes
                                        </span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge bg-secondary py-2 px-4">
                                            non
                                        </span>
                                    </td>                             
                                @endif
                                <td>{{ $order->created_at }}</td>
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

<!-- Modal : delete client -->
<div class="modal fade" id="deleteClient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        </div>
        <div class="modal-body">
          Etre vous sure de vouloir supprimer  {{ $client->nom." ".$client->prenom }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" wire:click="deleteUser">Oui</button>
        </div>
      </div>
    </div>
  </div>




<!-- Modal -->
<div class="modal fade" id="showMessage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        </div>
        <div class="modal-body">
          @isset($order)
            {{ $order->remarque }}
          @endisset
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



</section>

