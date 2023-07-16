<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductHome extends Component
{


    public $products ; 


    public function addToCart($product){
        // check if the product exist before
        $p = Cart::search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id == $product['id'];
        })->first(); 


        if(!$p){
            Cart::add([
                'id' =>  $product['id'], 
                "name" => $product['name'],
                "qty" => 1,
                "price" => $product["price"],
                "weight" => 0,
                'options' => [
                    'imageURL' => 'storage/products/thumbnail/'.$product['folder']."/".$product['thumb'],
                ]
            ]); 

            session()->flash('success', "Produit ajouté au panier");
            redirect()->route('website.home') ; 
        }

    }


    public function render()
    {
        return view('livewire.product-home');
    }
}
