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
                                <div class="form-group" wire:ignore>
                                    <input type="file" id="thumb" name="thumb" wire:model="thumb"/>
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
                                    <label for="price">Donnez le prix du produit</label>
                                    <input class="form-control" type="number" name="price" wire:model="price" id="price" placeholder="0.00 DA" required>
                                    @error('price') <span class="error ">{{ $message }}</span> @enderror
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
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" wire:model="status" id="ratio_01" value="1">
                                            <label class="form-check-label" for="ratio_01">Publier</label>
                                        </div>
                                </div>
                                @error('status') <span class="error">{{ $message }}</span> @enderror

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
                                            <input type="text" name="name" wire:model="name" class="form-control" id="exampleInputEmail1" placeholder="Enter le nom du produit">
                                            @error('name') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Code du produit</label>
                                            <input type="text" name="code" wire:model="code" class="form-control" id="exampleInputEmail1" placeholder="Enter le code du produit">
                                            @error('code') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Quantité du produit</label>
                                            <input type="number" name="qty" wire:model="qty" class="form-control" id="exampleInputEmail1" placeholder="Enter la quantité du produit" >
                                            @error('qty') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Petite description</label>
                                            <textarea class="form-control" name="small_desc" wire:model="small_desc" id="" rows="5" placeholder="Enterez une petit description du produit"></textarea>
                                            @error('small_desc') <span class="error">{{ $message }}</span> @enderror
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
                                    <div class="form-group" wire:ignore>
                                        <input type="file" name="gallery" wire:model="files"/>
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
                                    <button class="btn btn-secondary"  style="margin-right: 1rem;">Annuler</button>
                                    <button class="btn btn-primary" id="ajouter" wire:click="addProduct">Ajouter</button>
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
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>

<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    





{{-- Filepond configuration for the medias--}}
<script type="module">
    FilePond.registerPlugin(FilePondPluginImageCrop);
    FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.registerPlugin(FilePondPluginImageResize);



    // Get a reference to the file input element
    const inputElement = document.querySelector('input[name="gallery"]');
    const thumbInput = document.querySelector('#thumb');
    // Create a FilePond instance
    const pond = FilePond.create(inputElement, {

        // Crop configuration
        allowImageCrop : true,
        imageCropAspectRatio : "1:1",


        // Image resize
        allowImageResize: true,
        imageResizeTargetWidth : "470",
        imageResizeTargetHeight : "470",



        // Generale configuration
        allowMultiple : true , 
        credits	: false ,
        maxFiles : 5,
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
                onload: (response) => {
                    Livewire.emit('addFile', response) 
                    return response; 
                },
            },
            revert: {
                url: 'image/revert',
                method: 'DELETE',
                withCredentials: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                timeout: 7000,
                onload: (response) => {
                    Livewire.emit('deleteFile', response) 
                    return response; 
                },
            },
        },
    });


    const pondTwo = FilePond.create(thumbInput , {
        // Crop configuration
        
        allowImageCrop : true,
        imageCropAspectRatio : "1:1",


        allowImageResize: true,
        imageResizeTargetWidth : "470",
        imageResizeTargetHeight : "470",

        credits	: false ,
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
                onload: (response) => {
                    Livewire.emit('addThumbnail', response) 
                    return response; 
                },
            },
            revert: {
                url: 'image/revert',
                method: 'DELETE',
                withCredentials: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                timeout: 7000,
                onload: (response) => {
                    Livewire.emit('removeThumbnail', response) 
                    return response; 
                },
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
                const data =  JSON.stringify(outputData);
                @this.content = data; 
                @this.addProduct()
            }).catch((error) => {
                console.log('Saving failed: ', error)
            });
    })
</script>


</div>
