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
                    <span class="badge bg-primary">Resultat ( {{count($clients)}} )</span>
                    <span class="badge bg-secondary">selected (0)</span>
                </div>
                <div class="card">
                    <div class="card-header d-flex ">
                        <div class="">
                            <input class="form-control" type="text" placeholder="Chercher un client">
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
                                <th>email</th>
                                <th>numéro de telephone</th>
                                <th>nombre de commandes</th>
                                <th>ville</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr wire:key="{{ "client_".$client->id }}">
                                <td><input type="checkbox" id="{{ $client->id }}"></td>
                                <td><label for="{{ $client->id }}" class="d-flex justify-content-center align-items-center">
                                        {{ $client->nom." ".$client->prenom}}
                                </label></td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ count($client->orders) }} commande(s)</td>
                                <td>{{ $client->ville }}</td>
                                <td>
                                    <div class="dropdown">
                                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="action" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="action">
                                        <li><a class="dropdown-item" href="{{route('admin.clients.details', ['id' => $client->id])}}">Consulter</a></li>
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
</section>
</div>
