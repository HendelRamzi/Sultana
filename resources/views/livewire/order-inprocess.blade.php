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
                        <span class="badge bg-primary">Resultat ( {{count($orders)}} )</span>
                        <span class="badge bg-secondary">selected (0)</span>
                    </div>
                    <div class="card">
                        <div class="card-header d-flex ">
                            <div class="">
                                <input class="form-control" type="text" placeholder="Chercher une commande">
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
                                    <th>code</th>
                                    <th>client</th>
                                    <th>numéro de telephone</th>
                                    <th>status</th>
                                    <th>products number</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr wire:key="{{ "product_".$order->id }}">
                                    <td><input type="checkbox" id="{{ $order->id }}"></td>
                                    <td>
                                        <label for="{{ $order->id }}" class="d-flex justify-content-center align-items-center">{{ $order->code }}</label>
                                    </td>
                                    <td>{{ $order->client->nom." ".$order->client->prenom }}</td>
                                    <td>{{ $order->client->phone}}</td>
                                    @if($order->status->name == "placed")
                                        <td>  
                                            <span class="badge bg-info text-dark">
                                                {{ $order->status->name }}
                                            </span>
                                        </td>
                                    @endif
                                    <td>{{ count($order->products) }}</td>
                                    <td>
                                        <div class="dropdown">
                                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="action" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="action">
                                            <li><a class="dropdown-item" href="#">Consulter</a></li>
                                            <li><a class="dropdown-item" href="#">Modifier</a></li>
                                            <div class="dropdown-divider"></div>
                                            <li>
                                                <form class="dropdown-item" method="POST">
                                                    {{-- @csrf --}}
                                                    {{-- @method("delete") --}}
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
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
</div>
    