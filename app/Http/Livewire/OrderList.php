<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\ProductOrder;
use Livewire\Component;

class OrderList extends Component
{

    public $orders ; 
    
    public function mount(){
        $this->orders = Order::all(); 
    }

    public function deleteOrder($id){
        try{
            // delete the associated table
            $o = ProductOrder::where('order_id', $id)
            ->get(); 

            foreach($o as $or){
                $or->delete()   ;          
            }
            // delete the order
            Order::find($id)->delete() ;

            session()->flash("sucess", "
                Client deleted successfully
            ");
            redirect()->route('admin.orders.list'); 

        }catch(\Exception $e){
            dd($e->getMessage()); 

        }
    }


    public function render()
    {
        return view('livewire.order-list');
    }
}
