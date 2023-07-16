<div>

    {{-- @dump($selected_collection) --}}

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <div class=" py-3 col-12">
                            <!-- general form elements -->
                            @if (session()->has('success'))
                                <div id="feedback" class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div id="feedback" class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Creation d'une categorie</h3>
                                </div>
                                <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nom de la categorie</label>
                                            <input type="text" name="name" wire:model="name" class="form-control" id="exampleInputEmail1" placeholder="Enter le nom du produit">
                                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Petite description</label>
                                            <textarea class="form-control" name="small_desc" wire:model="small_desc" id="" rows="5" placeholder="Enterez une petit description du produit"></textarea>
                                            @error('small_desc') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Selectionnez la collection de cette categorie</label>
                                            <select name="collection" class="form-control" wire:model="selected_collection">
                                                <option value="" selected>Select the collection</option>
                                                @foreach ($collections as $collection)
                                                    <option value="{{$collection->id}}" wire:key="{{$collection->id}}">
                                                        {{$collection->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('small_desc') 
                                                <span class="text-danger">{{ $message }}</span> 
                                            @enderror
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-secondary"  style="margin-right: 1rem;">Annuler</button>
                                            <button class="btn btn-primary" wire:click="addCategory">Ajouter</button>
                                        </div>
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
</div>
