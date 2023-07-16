<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductDisplay extends Component
{

    public $products ; 
    public $categories ; 
    public $collections ; 


    public $categoryName;



    

    public function mount(){
        $this->products = Product::all(); 
        $this->categories = Category::all(); 
        $this->collections = Collection::all();
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
            redirect()->route('products.index') ; 
        }

    }

    public function gotoProduct($id){
        return redirect()->route('products.show', [
            'product' => $id
        ]);
    }


    public function render()
    {

        if ($this->categoryName) {
            $category = Category::where('name', 'like', '%' . $this->categoryName . '%')->first();
            $this->products = $category ? $category->products : collect();
            return view('livewire.product-display');
        } else {
            $this->products = Product::all();
            return view('livewire.product-display');
        }        
    }
}
