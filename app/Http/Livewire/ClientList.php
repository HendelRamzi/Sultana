<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class ClientList extends Component
{


    public $clients ; 


    public function mount(){
        $this->clients = Client::all() ;
    }


    public function render()
    {
        return view('livewire.client-list');
    }
}
