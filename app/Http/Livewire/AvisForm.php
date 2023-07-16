<?php

namespace App\Http\Livewire;

use App\Models\Commentaire;
use Livewire\Component;

class AvisForm extends Component
{

    public $product; 


    public function render()
    {
        return view('livewire.avis-form');
    }
}
