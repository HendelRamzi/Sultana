<?php

namespace App\Http\Livewire;

use App\Models\ProductOrder;
use Livewire\Component;

class ClientDetails extends Component
{



    public $client ; 
    public $orders = [] ; 

    public function mount(){
        $this->orders = $this->client->orders ; 
    }


    public function deleteUser(){
        try{
            // delete the user and all the order associated

            // Start with the product_order
            foreach($this->orders as $order){
                ProductOrder::where('order_id', $order->id)
                ->delete(); 
            }


            // delete all the client's orders
            foreach($this->orders as $order){
                $order->delete(); 
            }

            // delete the client 
            $this->client->delete(); 

            session()->flash("sucess", "
                Client deleted successfully
            ");
            redirect()->route('admin.clients.list'); 
        }catch(\Exception $error){

            session()->flash("error", "
                Un problem est survenu lors de la creation. Contactez les developpeurs
            ");
            redirect()->route('admin.clients.list');         
        }
    }


    public function render()
    {
        return view('livewire.client-details');
    }
}
