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
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div >
                            <h5>Informations contact</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h6 style="font-weight: bold">Nom du client</h6>
                                <p>
                                    {{ $contact->nom." ".$contact->prenom }}
                                </p>
                            </div>
                            <div class="col-6">
                                <h6 style="font-weight: bold">Email</h6>
                                <p>
                                    {{ $contact->email }}
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
                            <h5>Suppression du message</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <p>
                                   Cette action va detruire le message a jamais.
                                </p>
                            </div>
                        </div>                    
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteClient">
                            Supprimer le message
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
                            <h5>
                                Le contenu du message
                            </h5>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <textarea disabled class="form-control" rows="10">{{  $contact->message }}</textarea>
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
          Etre vous sure de vouloir supprimer le message
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" wire:click="deleteContact">Oui</button>
        </div>
      </div>
    </div>
  </div>





</section>
