<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}


    <section class="container" style="padding-bottom: 100px ;">
        <div class="row" style=" padding-bottom: 100px !important;">
            <div class="col-12 col-lg-9 form_container">
                <h3>Contactez nous</h3>
    
                <p>
                    Nous sommes impatients de vous entendre ! N'hésitez pas à nous contacter pour toute question, suggestion ou demande d'assistance. Notre équipe dévouée est là pour vous aider et vous offrir un service personnalisé.
                </p>
    
                <form id="billing-form" name="billing-form" class="row mb-0" action="#" method="post">
    
                    <div class="col-md-6 form-group mb-4">
                        <label for="billing-form-name">Nom:</label>
                        <input type="text" placeholder="Entez votre nom" id="billing-form-name" name="billing-form-name" wire:model.defer="contact.nom" class="sm-form-control" />
                    </div>
    
                    <div class="col-md-6 form-group">
                        <label for="billing-form-lname">Prenom:</label>
                        <input type="text" placeholder="Prenom" id="billing-form-lname" name="billing-form-lname" wire:model.defer="contact.prenom" class="sm-form-control" />
                    </div>
    
    
                    <div class="col-md-12 form-group  mb-4">
                        <label for="billing-form-email">Email Adresse:</label>
                        <input type="email" placeholder="Entrez votre email" id="billing-form-email" name="billing-form-email" wire:model.defer="contact.email"  class="sm-form-control" />
                    </div>
    
                    <div class="col-12 form-group mb-4">
                        <label for="shipping-form-message">Message</label>
                        <textarea class="sm-form-control" placeholder="Ecrivez votre message ici" wire:model.defer="contact.message"  id="shipping-form-message" name="shipping-form-message" rows="6" cols="30"></textarea>
                    </div>
    
                    <div class="col-md-12 form-group">
                        <button wire:click.prevent="submitContact"  class="button button-black">Envoyer le message</button>
                    </div>
    
                </form>
            </div>
            <div class="col-12 col-lg-3 contact_info">
                <div class="row">
                    <div class="col-12 champ">
                        <h1>Notre localisation</h1>
                        <p>Hasnaoui, Oran. Algerie</p>
                    </div>
                    <div class="col-12 champ">
                        <h1>Prendre contact</h1>
                        <div class="info" style="margin-bottom: 20px !important;">
                            <h3>Phone number</h3>
                            <p>0553898242</p>
                        </div>
                        <div class="info">
                            <h3>email</h3>
                            <p>sultana@gmail.com</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    
        <hr>
    </section>
    



</div>
