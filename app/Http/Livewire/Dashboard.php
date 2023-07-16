<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Commentaire;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class Dashboard extends Component
{

    public $products, $commentaire, $clients, $commandes; 

    public function mount(){
        $this->products = Product::all()->count(); 
        $this->commentaire = Commentaire::where('published', 0)->count(); 
        $this->clients = Client::all()->count(); 
        $this->commandes = Order::where('status_id', "8")->count(); 
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
