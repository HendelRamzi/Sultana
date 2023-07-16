<div id="wrapper">
    <!-- Page Title
    ============================================= -->
    <section id="page-title">

        <div class="container ">
            <h1>Checkout</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('website.home')}}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Nos produits</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
					<div class="row col-mb-50 g-50">
                        @if(session()->has('processError'))
                            <div class="col-12">
                                {{session()->get('processError')}}
                            </div>
                        @endif

                        <div class="col-lg-6">
							<h3>Informations personnelles</h3>

							<p>Vos informations personnelles sont essentielles pour finaliser votre commande en toute sécurité. Nous les traitons avec la plus grande confidentialité et ne les utilisons que dans le cadre de votre achat.</p>

							<div id="billing-form"  class="row mb-0">

								<div class="col-md-6 form-group mb-4">
									<label for="billing-form-name">Nom:</label>
									<input type="text" wire:model="client.nom" placeholder="Entez votre nom" id="billing-form-name" name="billing-form-name" value="" class="sm-form-control" />
								</div>

								<div class="col-md-6 form-group">
									<label for="billing-form-lname">Prenom:</label>
									<input type="text" wire:model="client.prenom" placeholder="Prenom" id="billing-form-lname" name="billing-form-lname" value="" class="sm-form-control" />
								</div>

                                <div class="col-12 form-group  mb-4">
									<label for="billing-form-city">Ville</label>
									<input type="text" wire:model="client.ville" placeholder="Entrez votre ville" id="billing-form-city" name="billing-form-city" value="" class="sm-form-control" />
								</div>

                                <div class="col-12 form-group  mb-4">
									<label for="billing-form-city">Commune</label>
									<input type="text" wire:model="client.commune" placeholder="Entrez votre Commune" id="billing-form-city" name="billing-form-city" value="" class="sm-form-control" />
								</div>

								<div class="col-12 form-group mb-4">
									<label for="billing-form-address">Address:</label>
									<input type="text" wire:model="client.adress" placeholder="Entrez votre adress de domicile" id="billing-form-address" name="billing-form-address" value="" class="sm-form-control" />
								</div>

								<div class="col-md-6 form-group  mb-4">
									<label for="billing-form-email">Email Adresse:</label>
									<input type="email" wire:model="client.email" placeholder="Entrez votre email" id="billing-form-email" name="billing-form-email" value="" class="sm-form-control" />
								</div>

								<div class="col-md-6 form-group">
									<label for="billing-form-phone">numéro de telephone:</label>
									<input type="text" wire:model="client.phone" placeholder="Entrez votre numéro de tel" id="billing-form-phone" name="billing-form-phone" value="" class="sm-form-control" />
								</div>

                                <div class="col-12 form-group">
									<label for="shipping-form-message">Remarque a Ajouter</label>
									<textarea class="sm-form-control" wire:model="remarque" placeholder="Ecrivez votre message ici" id="shipping-form-message" name="shipping-form-message" rows="6" cols="30"></textarea>
								</div>

							</div>
						</div>
                        <div class="col-12 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>Votre commande</h4>
        
                                    <div class="table-responsive">
                                        <table class="table cart">
                                            <thead>
                                                <tr>
                                                    <th class="cart-product-thumbnail">&nbsp;</th>
                                                    <th class="cart-product-name">Product</th>
                                                    <th class="cart-product-quantity">Quantity</th>
                                                    <th class="cart-product-subtotal">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($products as $i => $product)
                                                    <tr class="cart_item" wire:key="{{$i}}">
                                                        <td class="cart-product-thumbnail">
                                                            <a href="{{route('products.show', ['product' => $product['id']])}}"><img width="64" height="64" src="{{asset($product['options']['imageURL'])}}" alt="Pink Printed Dress"></a>
                                                        </td>
            
                                                        <td class="cart-product-name">
                                                            <a href="{{route('products.show', ['product' => $product['id']])}}"> {{ $product['name'] }} </a>
                                                        </td>
            
                                                        <td class="cart-product-quantity">
                                                            <div class="quantity clearfix">
                                                                {{$product['qty']}}
                                                            </div>
                                                        </td>
            
                                                        <td class="cart-product-subtotal">
                                                            <span class="amount">{{ $product['price'] * $product['qty'] }} da</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-5 ">
                                    <h4>Le total</h4>
        
                                    <div class="table-responsive">
                                        <table class="table cart">
                                            <tbody>
                                                <tr class="cart_item">
                                                    <td class="border-top-0 cart-product-name">
                                                        <strong>Total des achats</strong>
                                                    </td>
        
                                                    <td class="border-top-0 cart-product-name">
                                                        <span class="amount">{{ $this->total() }} da</span>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="cart-product-name">
                                                        <strong>Frais de livraison</strong>
                                                    </td>
        
                                                    <td class="cart-product-name">
                                                        <span class="amount">Free Delivery</span>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="cart-product-name">
                                                        <strong>Total de la commande</strong>
                                                    </td>
        
                                                    <td class="cart-product-name">
                                                        <span class="amount color lead"><strong>{{ $this->total() }} da</strong></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @if(count($products)  >= 1 ) 
                                        <a  wire:click="placeOrder" class="button button-3d button-black">Passer la commande</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>

</div>