<div>
            <!-- general form elements -->
    @if (session()->has('success'))
        <div id="feedback" class="alert alert-success col-16">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div id="feedback" class="alert alert-danger col-16">
            {{ session('error') }}
        </div>
    @endif

    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Collections</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Liste des Collections</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="py-3">
                        <span class="badge bg-primary">Resultat ({{count($collections)}})</span>
                        <span class="badge bg-secondary">selected (0)</span>
                    </div>
                    <div class="card">
                        <div class="card-header d-flex ">
                            <div class="">
                                <input class="form-control" type="text" placeholder="Chercher une collections">
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
                                    <th>Nombre de categories</th>
                                    <th class="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collections as $collection)
                                    <tr wire:key="{{$collection->id}}">
                                        <td><input type="checkbox" id="{{ "collection_". $collection->id }}"></td>
                                        <td><label for="{{ "collection_". $collection->id }}" style="cursor: pointer">{{$collection->name}}</label></td>
                                        <td> {{ count($collection->categories) }} Categorie(s)</td>
                                        <td class="">
                                            <div class="dropdown">
                                            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="action" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="action">
                                                <li><a class="dropdown-item" href="{{route('admin.collections.details', ['id'=> $collection->id])}}">Consulter</a></li>                                                
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
