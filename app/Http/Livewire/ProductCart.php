<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductCart extends Component
{

    public $product ;
    
    public $qty = 1 ; 

    public function addQty(){
        if($this->qty < $this->product->qty){
            $this->qty++ ; 
        }
    }

    public function removeQty(){
        if($this->qty > 1){
            $this->qty-- ; 
        }
    }


    public function addToCart(){
        $p = Cart::search(function ($cartItem, $rowId){
            return $cartItem->id == $this->product['id'];
        })->first(); 

        if(!$p){
            // Add to the cart 
            Cart::add([
                'id' =>  $this->product->id, 
                "name" => $this->product->name,
                "qty" => $this->qty,
                "price" => $this->product->price,
                "weight" => 0,
                'options' => [
                    'imageURL' => 'storage/products/thumbnail/'.$this->product->folder."/".$this->product->thumb,
                ]
            ]); 

            // dd(Cart::content());
            return redirect()->route('products.show', ['product' => $this->product->id]);
        }



    }


    public function goToCheckout(){
        // Add to the cart 
        $p = Cart::search(function ($cartItem, $rowId){
            return $cartItem->id == $this->product['id'];
        })->first(); 

        if(!$p){
            // Add to the cart 
            Cart::add([
                'id' =>  $this->product->id, 
                "name" => $this->product->name,
                "qty" => $this->qty,
                "price" => $this->product->price,
                "weight" => 0,
                'options' => [
                    'imageURL' => 'storage/products/thumbnail/'.$this->product->folder."/".$this->product->thumb,
                ]
            ]); 

            // dd(Cart::content());
            return redirect()->route('checkout');
        }
    }





    public function render()
    {
        return view('livewire.product-cart');
    }
}
