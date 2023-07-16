<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderInprocess extends Component
{
    public $orders ; 
    
    public function mount(){
        $this->orders = Order::where('status_id', 10)->get();  
    }




    public function render()
    {
        return view('livewire.order-inprocess');
    }
}
