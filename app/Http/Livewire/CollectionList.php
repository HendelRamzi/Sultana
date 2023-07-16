<?php

namespace App\Http\Livewire;

use App\Models\Collection;
use Livewire\Component;

class CollectionList extends Component
{

    public $collections = [] ; 

    public function mount(){
        $this->collections = Collection::all(); 
    }



    public function render()
    {
        return view('livewire.collection-list');
    }
}
