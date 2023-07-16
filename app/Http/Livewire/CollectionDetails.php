<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CollectionDetails extends Component
{

    public $categories ;
    public $collection;


    public function deleteCollection(){
        try{


            $this->collection->delete() ;

            session()->flash('success', "La collection a bien été supprimé");
            return redirect()->route('admin.collections.list'); 
        }catch(\Exception $error){
            session()->flash('error', "Un problem est survenu lors de la suppression. Contactez les développeurs");
            return redirect()->route('admin.collections.list'); 
        }
    }

    public function updateCollection(){
        $this->validate(); 

        try{
            $this->collection->save();

            session()->flash('processSuccess', 'La collection a bien été modifier');
            redirect()->route('admin.collections.details', ['id' => $this->collection->id]); 
        }catch(\Exception $error){
            session()->flash('processError', 'Un problem est survenu lors de la modification. Contactez les développeurs');
            redirect()->route('admin.collections.details', ['id' => $this->collection->id]); 
        }

    }


    public function mount($collection){
        $this->categories = $this->collection->categories ; 
    }


    protected $rules = [
        'collection.name' => "required|string",
        "collection.desc" => "required|string|max:255"
    ];


    public function render()
    {
        return view('livewire.collection-details');
    }
}
