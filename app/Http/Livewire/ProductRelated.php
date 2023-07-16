<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductRelated extends Component
{


    public $products ; 



    public function mount(){
        $this->products = Product::take(4)->get(); 
    }

    public function render()
    {
        return view('livewire.product-related');
    }
}
