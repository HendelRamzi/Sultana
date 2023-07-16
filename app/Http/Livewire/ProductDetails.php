<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductDetails extends Component
{


    public $product ;

    public $files = [] ; 
    
    public $thumb = null ; 
    public $categories = [], $collections = [] ; 

    public  $content ; 

    public function mount(){
        $this->content = $this->product->long_desc; 
    }


    public function render()
    {
        return view('livewire.product-details');
    }
}
