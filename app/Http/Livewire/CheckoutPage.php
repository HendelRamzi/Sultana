<?php

namespace App\Http\Livewire;
use App\Models\Client;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\Status;
use Gloudemans\Shoppingcart\Facades\Cart ;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CheckoutPage extends Component
{

    public $products, $total= 0 ; 
    public $remarque = null ;
    public Client $client ; 


    public function mount(){
        $this->products = Cart::content()->toArray() ;
        $this->client = new Client(); 
    }
    
    public function placeOrder(){
        $this->validate(); 
        // DB::beginTransaction();
        try{
            
            // register the client.
            $this->client?->save(); 
            // Get the status
            $status = Status::where('name', "placed")->first(); 

            // Create the order
            $order = Order::create([
                'code' => uniqid('order_'),
                "client_id" => $this->client->id,
                "status_id" => $status->id,
                "remarque" => $this->remarque
            ]); 


            // hander the products for the order

            foreach($this->products as $product){
                // put the product Id with the order ID
                ProductOrder::create([
                    "product_id" => $product['id'],
                    "order_id" => $order->id
                ]); 
            }

            dd('order placed. Create the confirmation page'); 

        }catch(\Exception $error){
            // DB::rollback();
            dd($error->getMessage()); 
            session()->flash('processError', $error->getMessage()); 
            return redirect()->back(); 
        }

    }


    public function total(){
        $x = 0 ; 
        foreach($this->products as $product){
            $x = $x + ($product['price'] * $product['qty']) ;
        }

        $this->total = $x ; 
        return $x ; 
    }



    protected $rules = [
        'client.nom' => 'required|string',
        'client.prenom' => 'required|string',
        'client.email' => 'required|email',
        'client.phone' => 'required|string',
        'client.adress' => 'required|string',
        'client.ville' => 'required|string',
        'client.commune' => 'required|string',
    ];



    public function render()
    {
        return view('livewire.checkout-page');
    }
}
