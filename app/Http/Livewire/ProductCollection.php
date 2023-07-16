<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Collection;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductCollection extends Component
{

    public $collection ; 
    public $collections ;   

    public $products;

    public $categories;

    
    public function mount(){
        $this->collections = Collection::all(); 
        $this->categories = Category::all(); 
    }


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
            redirect()->route('website.collection', [
                'name' => $this->collection->name
            ]) ; 
        }

    }
    



    public function productCount(){
        $x = 0 ; 
        foreach($this->collection->categories as $c){
            $x = $x + count($c->products); 
        }
        return $x ;
    }

    public function render()
    {
        return view('livewire.product-collection');
    }
}
