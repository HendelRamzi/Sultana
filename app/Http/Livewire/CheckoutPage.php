<?php

namespace App\Http\Livewire;
use Gloudemans\Shoppingcart\Facades\Cart ;
use Livewire\Component;

class CheckoutPage extends Component
{

    public $products ; 

    public function mount(){
        $this->products = Cart::content()->toArray() ;
    }
    
    public function placeOrder(){
        dd('order placed'); 
    }



    public function render()
    {
        return view('livewire.checkout-page');
    }
}
