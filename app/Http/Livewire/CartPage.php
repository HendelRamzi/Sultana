<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Collection;
use Livewire\Component;

class CartPage extends Component
{
    public  $products ; 
    public $thumbnail ; 


    /**
     * Livewire hook method
     */

     public function mount(){
        $this->products = Cart::content()->toArray() ;  
     }



    /**
     * Event handler method
     */

    public function addQty($i){
        $this->products[$i]['qty']++ ; 
        // dd($this->products); 
    }

    public function removeQty($i){  
        if($this->products[$i]['qty'] > 1){
            $this->products[$i]['qty']-- ; 
        }
    }

    public function deleteItem($i){
        unset($this->products[$i]);
        Cart::remove($i); 
        redirect()->route('cart.index'); 
    }



    // Computed Property
    public function totalProduit($qty , $price)
    {
        return $price * $qty; 
    }

    public function totalCount(){
        $sum = 0 ;
        foreach($this->products as $product){
            $sum = $sum + $this->totalProduit($product['qty'], $product['price']) ; 
        }

        return $sum ; 
    }

    

    public function goToCheckout(){
        return redirect()->route('checkout');
        
    }



    public function render()
    {
        return view('livewire.cart-page');
    }
}
