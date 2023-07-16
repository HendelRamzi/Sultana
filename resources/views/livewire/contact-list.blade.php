<div>
    {{-- In work, do what you enjoy. --}}



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
                    <span class="badge bg-primary">Resultat ( {{count($contacts)}} )</span>
                    <span class="badge bg-secondary">selected (0)</span>
                </div>
                <div class="card">
                    <div class="card-header d-flex ">
                        <div class="">
                            <input class="form-control" type="text" placeholder="Chercher un contacts">
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
                                <th>message</th>
                                <th>date d'envoie</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr wire:key="{{ "client_".$contact->id }}">
                                <td><input type="checkbox" id="{{ $contact->id }}"></td>
                                <td><label for="{{ $contact->id }}" class="d-flex justify-content-center align-items-center">
                                        {{ $contact->nom." ".$contact->prenom}}
                                </label></td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->message }}</td>
                                <td> {{  $contact->created_at }} </td>
                                <td>
                                    <div class="dropdown">
                                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="action" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="action">
                                        <li><a class="dropdown-item" href="{{route('admin.contacts.details', ['id' => $contact->id])}}">Consulter</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <button class="dropdown-item bg-danger " wire:click="deleteContact({{$contact->id}})">
                                                Supprimer
                                            </button>
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
