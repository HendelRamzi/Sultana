<div id="wrapper">
    <!-- Page Title
    ============================================= -->
    <section id="page-title">

        <div class="container ">
            <h1>Checkout</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
					<div class="row col-mb-50 g-50">
                        <div class="col-lg-6">
							<h3>Informations personnelles</h3>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>

							<form id="billing-form" name="billing-form" class="row mb-0" action="#" method="post">

								<div class="col-md-6 form-group mb-4">
									<label for="billing-form-name">Nom:</label>
									<input type="text" placeholder="Entez votre nom" id="billing-form-name" name="billing-form-name" value="" class="sm-form-control" />
								</div>

								<div class="col-md-6 form-group">
									<label for="billing-form-lname">Prenom:</label>
									<input type="text" placeholder="Prenom" id="billing-form-lname" name="billing-form-lname" value="" class="sm-form-control" />
								</div>

                                <div class="col-12 form-group  mb-4">
									<label for="billing-form-city">Ville</label>
									<input type="text" placeholder="Entrez votre ville" id="billing-form-city" name="billing-form-city" value="" class="sm-form-control" />
								</div>

								<div class="col-12 form-group mb-4">
									<label for="billing-form-address">Address:</label>
									<input type="text" placeholder="Entrez votre adress de domicile" id="billing-form-address" name="billing-form-address" value="" class="sm-form-control" />
								</div>

								<div class="col-md-6 form-group  mb-4">
									<label for="billing-form-email">Email Adresse:</label>
									<input type="email" placeholder="Entrez votre email" id="billing-form-email" name="billing-form-email" value="" class="sm-form-control" />
								</div>

								<div class="col-md-6 form-group">
									<label for="billing-form-phone">numéro de telephone:</label>
									<input type="text" placeholder="Entrez votre numéro de tel" id="billing-form-phone" name="billing-form-phone" value="" class="sm-form-control" />
								</div>

                                <div class="col-12 form-group">
									<label for="shipping-form-message">Remarque a Ajouter</label>
									<textarea class="sm-form-control" placeholder="Ecrivez votre message ici" id="shipping-form-message" name="shipping-form-message" rows="6" cols="30"></textarea>
								</div>

							</form>
						</div>
                        <div class="col-12 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>Your Orders</h4>
        
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
                                                            <a href="#"><img width="64" height="64" src="images/shop/thumbs/small/dress-3.jpg" alt="Pink Printed Dress"></a>
                                                        </td>
            
                                                        <td class="cart-product-name">
                                                            <a href="#"> {{ $product['name'] }} </a>
                                                        </td>
            
                                                        <td class="cart-product-quantity">
                                                            <div class="quantity clearfix">
                                                                {{$product['qty']}}
                                                            </div>
                                                        </td>
            
                                                        <td class="cart-product-subtotal">
                                                            <span class="amount">$39.98</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-5 ">
                                    <h4>Cart Totals</h4>
        
                                    <div class="table-responsive">
                                        <table class="table cart">
                                            <tbody>
                                                <tr class="cart_item">
                                                    <td class="border-top-0 cart-product-name">
                                                        <strong>Cart Subtotal</strong>
                                                    </td>
        
                                                    <td class="border-top-0 cart-product-name">
                                                        <span class="amount">$106.94</span>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="cart-product-name">
                                                        <strong>Shipping</strong>
                                                    </td>
        
                                                    <td class="cart-product-name">
                                                        <span class="amount">Free Delivery</span>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="cart-product-name">
                                                        <strong>Total</strong>
                                                    </td>
        
                                                    <td class="cart-product-name">
                                                        <span class="amount color lead"><strong>$106.94</strong></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <a href="#" wire:click="placeOrder" class="button button-3d button-black">Passer la commande</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>

</div>