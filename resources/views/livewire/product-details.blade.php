<div>

    {{-- @dump($cate) --}}


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if(session()->has("processSuccess"))
                    <div class="col-12 py-2 px-4 alert alert-success" role="alert">
                        {{ session()->get('processSuccess') }}
                    </div>
                @endif
                @if(session()->has("processError"))
                    <div class=" col-12 py-2 px-4 alert alert-danger" role="alert">
                        {{ session()->get('processError') }}
                    </div>
                @endif
                <div class="col-12 col-lg-4">
                    <div class=" py-3 col-12">
                        <!-- Media form -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Thumbnail</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div style="width: 100%; padding: 2rem" >
                                    <img class="img-fluid" src="{{asset('storage/products/thumbnail/'.$product->folder.'/'.$product->thumb)}}" alt="">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class=" py-3 col-12">
                        <!-- Media form -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Prix</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="price">prix du produit</label>
                                    <input class="form-control" type="number" name="price" value="{{$product->price}}" id="price" placeholder="0.00 DA" disabled>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class=" py-3 col-12">
                        <!-- Media form -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><b>Status</b></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Selection le status du produit</label>
                                    @if($product->published == 1)
                                        <input type="text"  class="form-control" value="Publié" disabled>
                                    @endif

                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class=" py-3 col-12">
                        <!-- Media form -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Categorie et Collection</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Collections</label>
                                    <input type="text" class="form-control" value="{{$product->categories[0]->collection->name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Categories</label>
                                    <input type="text" class="form-control" value="{{$product->categories[0]->name}}" disabled>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
        
                </div>
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <div class=" py-3 col-12">
                            <!-- general form elements -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">General</h3>
                                </div>
                                <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nom du produit</label>
                                            <input type="text" name="name" value="{{$product->name}}" class="form-control" id="exampleInputEmail1" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Code du produit</label>
                                            <input type="text" name="code" value="{{$product->code}}" class="form-control" id="exampleInputEmail1" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Quantité du produit</label>
                                            <input type="number" name="qty" value="{{$product->qty}}" class="form-control" id="exampleInputEmail1" disabled >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Petite description</label>
                                            <textarea class="form-control" name="small_desc"  rows="5" disabled>{{$product->short_desc}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description General</label>
                                            <div id="editorjs" wire:ignore></div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class=" py-3 col-12">
                            <!-- Media form -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Gallery Photos</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($product->gallery as $image)
                                            <div class="col-12 py-3" wire:key="{{$image->id}}">
                                                <img  class="img-fluid" src="{{asset('storage/products/gallery/'.$image->folder.'/'.$image->image)}}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                        <div class=" py-3 col-12">
                            <!-- Media form -->
                            <div class="card card-info">
                                <div class="card-body d-flex justify-content-end">
                                    <button class="btn btn-secondary"  style="margin-right: 1rem;">Retour</button>
                                    <button class="btn btn-primary" id="ajouter" wire:click="addProduct">Modifier</button>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex ">
                            <h3>Liste des avis</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>email</th>
                                    <th>créé le </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product->avis as $avis)
                                <tr wire:key="{{ "product_".$product->id }}">
                                    <td><label>
                                        <div>
                                            {{ $avis->nom }}
                                        </div>
                                    </label></td>
                                    <td>{{ $avis->email }}</td>
                                    <td>{{ $avis->created_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="action" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="action">
                                            <li><a class="dropdown-item" href="{{route('admin.avis.details', ['id' => $avis->id])}}">Consulter</a></li>
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
            </div>
        </div>
    </section>



<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    
<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>



{{-- EditorJS configuration --}}
<script>
    let content = @js($content) ; 
    const editor = new EditorJS({
        holder: 'editorjs',
        readOnly: true,
        placeholder: 'Ecrivez votre description ici !',
        tools: {
            list: {
                class: List,
                inlineToolbar: true,
                config: {
                    defaultStyle: 'unordered'
                }
            },


            // header plugins
            header : {
                class: Header,
                config : {
                    placeholder: 'Enter a header',
                    levels: [2, 3],
                    defaultLevel: 3
                }
            }


        },

        data : JSON.parse(content) 
    });
</script>



</div>
