<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ProductController;
use App\Models\Collection;
use Livewire\Component;

class CategoryDetails extends Component
{

    public $cat; 
    public $products ; 
    public $collections ;

    public function deleteCategorie(){
        $productController = new ProductController(); 
        try{

            // delete the asssociated products
            foreach($this->cat->products as $product){
                // dd($product->id) ;

                // Handler all the process of deleting the product
                $productController->deleteProducts($product->id); 
            }


            // delete the category
            $this->cat->delete() ;            

            session()->flash('processSuccess', "La catégorie a bien été supprimée");
            return redirect()->route('admin.categories.list'); 

        }catch(\Exception $error){
            session()->flash('processError', "Un prblème est survenu lors de la suppression. Contractez les développeurs");
            return redirect()->route('admin.categories.list');         
        }
    }






    public function updateCategory(){
        try{
            $this->validate(); 

            $this->cat->save(); 
    
            session()->flash('processSuccess', 'La category a bien été modifier');
            redirect()->route('admin.categories.details', ['id' => $this->cat->id]); 
        }catch(\Exception $error){
            session()->flash('processError', "Un prblème est survenu lors de la modification. Contractez les développeurs");
            redirect()->route('admin.categories.details', ['id' => $this->cat->id]); 
        }
    }

    public function mount(){
        $this->products = $this->cat->products ;
        $this->collections = Collection::all(); 
        // dd($this->products); 
    }



    protected $rules = [
        'cat.name' => "required|string", 
        "cat.collection_id" => "required",
        "cat.desc" => "required|string|max:255"
    ];



    public function render()
    {
        return view('livewire.category-details');
    }
}
