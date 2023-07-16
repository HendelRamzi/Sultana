<div>

    {{-- @dump($files) --}}
    @error('product.name') <span class="error">{{ $message }}</span> @enderror
    @error('product.price') <span class="error">{{ $message }}</span> @enderror
    @error('cate') <span class="error">{{ $message }}</span> @enderror
    @error('product.qty') <span class="error">{{ $message }}</span> @enderror
    @error('product.code') <span class="error">{{ $message }}</span> @enderror
    @error('product.short_desc') <span class="error">{{ $message }}</span> @enderror
    @error('product.long_desc') <span class="error">{{ $message }}</span> @enderror
    @error('product.folder') <span class="error">{{ $message }}</span> @enderror
    @error('product.thumb') <span class="error">{{ $message }}</span> @enderror
    @error('product.published') <span class="error">{{ $message }}</span> @enderror
    @error('content') <span class="error">{{ $message }}</span> @enderror
    @error('files') <span class="error">{{ $message }}</span> @enderror
    @error('thumb') <span class="error">{{ $message }}</span> @enderror


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
                            <div class="card-body" wire:ignore>
                                <input type="file" name="thumb" id="thumb">
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
                                    <input class="form-control" type="number" name="price" wire:model ="product.price" value="{{$product->price}}" id="price" placeholder="0.00 DA">
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
                                    <select class="form-control select2" wire:model="collection" style="width: 100%;">
                                      <option value="" selected="selected">Selectionnez une collection</option>
                                      @foreach ($collections as $collection)
                                        <option value="{{$collection->id}}" wire:key="{{$collection->id}}">{{$collection->name}}</option>  
                                      @endforeach
                                    </select>
                                    @error('collection') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Categories</label>
                                    <select class="form-control select2" name="cate" wire:model="cate" style="width: 100%;">
                                      <option selected="selected">Selectionnez une categorie</option>
                                      @foreach ($categories as $cat)
                                        <option value="{{$cat->id}}" wire:key="{{$cat->id}}"> {{$cat->name}} </option>
                                      @endforeach
                                    </select>
                                    @error('cate') <span class="error">{{ $message }}</span> @enderror
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
                                            <input type="text" name="name" wire:model ="product.name" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Code du produit</label>
                                            <input type="text" name="code" wire:model ="product.code" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Quantité du produit</label>
                                            <input type="number" name="qty" wire:model ="product.qty" class="form-control" id="exampleInputEmail1"  >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Petite description</label>
                                            <textarea class="form-control" name="small_desc" wire:model ="product.short_desc"  rows="5" >{{$product->short_desc}}</textarea>
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
                                <div class="card-body" wire:ignore>
                                    <input type="file" name="gallery[]" id="gallery">
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
                                    <button class="btn btn-primary" id="ajouter">Modifier</button>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
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




{{-- Filepond configuration for the medias--}}
<script type="module">
    FilePond.registerPlugin(FilePondPluginImageCrop);
    FilePond.registerPlugin(FilePondPluginImagePreview);



    // Get a reference to the file input element
    const galleryInput = document.querySelector('#gallery');
    const thumbInput = document.querySelector('#thumb');
    // Create a FilePond instance
    const pond = FilePond.create(galleryInput, {

        // Crop configuration
        allowImageCrop : true,
        imageCropAspectRatio : "1:1",


        // Generale configuration
        allowMultiple : true , 
        credits	: false ,
        maxFiles : 5,
        files: [
            @foreach($product->gallery as $img)
                {
                    source: '{{ $img->folder."-".$img->image }}',
                    options: {
                        type: 'local'
                    }
                },
            @endforeach
        ],
        server: {
            url: 'http://127.0.0.1:8000/',
            process: {
                url: 'image/process/gallery',
                method: 'POST',
                withCredentials: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                timeout: 7000,
            },
            revert: {
                url: 'image/revert',
                method: 'DELETE',
                withCredentials: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                timeout: 7000,
            },
            load: {
                url: 'image/load/',
                method: 'GET',
                withCredentials: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                timeout: 7000,
            },
        },
    });


    const pondTwo = FilePond.create(thumbInput , {
        // Crop configuration
        
        allowImageCrop : true,
        imageCropAspectRatio : "1:1",
        credits	: false ,
        files: [
            {
                source: '{{ $product->folder."-".$product->thumb }}',
                options: {
                    type: 'local'
                }
            },
        ],
        server: {
            url: 'http://127.0.0.1:8000/',
            process: {
                url: 'image/process',
                method: 'POST',
                withCredentials: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                timeout: 7000,
            },
            revert: {
                url: 'image/revert',
                method: 'DELETE',
                withCredentials: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                timeout: 7000,
            },
            load: {
                url: 'image/load/thumbnail/',
                method: 'GET',
                withCredentials: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                timeout: 7000,
            },
        },
    })



</script>




{{-- Handle Editor.js save() function --}}

<script>
document.querySelector('#ajouter')
    .addEventListener('click', (e)=>{
            e.preventDefault(); 
            editor.save().then((outputData) => {


                const galleryPhotos = [] ;

                const data =  JSON.stringify(outputData);
                // get all the data from the inputs 
                const name = document.querySelector('input[name="name"]').value
                const code = document.querySelector('input[name="code"]').value
                const qty = document.querySelector('input[name="qty"]').value
                // const small_desc = document.querySelector('input[name="small_desc"]').value
                const price = document.querySelector('input[name="price"]').value
                const thumb = document.querySelector('input[name="thumb"]').value
                const gallery = document.querySelectorAll('input[name="gallery[]"]')
                
                
                for(let i =0; i < gallery.length ; i++){
                    galleryPhotos.push(gallery[i].value); 
                    // console.log(gallery[i].value)
                }

                // fire and event to the livewire php. where we send the 
                // Editorjs data
                // Gallery images
                // the thumbnail 
                @this.content = data; 
                @this.updateProduct(data, galleryPhotos, thumb);
                // Livewire.emit('updateProduct');
                
                




            }).catch((error) => {
                console.log('Saving failed: ', error)
            });
    })
</script>


</div>
