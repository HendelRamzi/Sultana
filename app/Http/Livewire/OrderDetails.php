<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Status;
use Livewire\Component;

class OrderDetails extends Component
{


    public Order $order ;   
    public $products;
    public $client ;

    public $total  = 0;

    public $status ; 


    public function calcTotal(){
        $x = 0 ; 
        foreach($this->products as $product){
            $x = $x + ($product->qty * $product->price) ;
        }
        return $x ; 
    }


    public function mount($order){
        $this->products = $order->products ;
        $this->client = $order->client;  

        $this->status = Status::all();
        // dd($this->products); 
    }















    protected $rules = [
        "order.status_id" => "required"
    ]; 


    public function updateState(){
        try{
            $this->order->save(); 
            session()->flash('success', "Le status a bien été modifier" );
            redirect()->route('admin.orders.details', ['id' => $this->order->id]);
        }catch(\Exception $error){
            session()->flash('error', "Un probléme est survenu lors de la modification. Contactez les developpeur" );
            redirect()->route('admin.orders.details', ['id' => $this->order->id]);
        }
    }


    public function render()
    {
        return view('livewire.order-details');
    }
}
