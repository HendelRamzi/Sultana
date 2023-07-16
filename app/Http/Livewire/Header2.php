<?php

namespace App\Http\Livewire;

use App\Models\Collection;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Header2 extends Component
{
    public $cart = []; 
    public $collections ; 


    public function mount(){
        $this->cart = Cart::content()->toArray() ;
        $this->collections = Collection::all(); 

        // dd($this->cart) ; 
    }

    public function goToCart(){
        return redirect()->route('cart.index'); 
    }

    public function render()
    {
        return view('livewire.header2');
    }
}
