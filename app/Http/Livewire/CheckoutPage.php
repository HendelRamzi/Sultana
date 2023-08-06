<?php

namespace App\Http\Livewire;
use App\Models\Client;
use App\Models\Commune;
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

    public $communes, $selected_commune, $livraison_type ;

    public function mount(){
        $this->products = Cart::content()->toArray() ;
        $this->client = new Client(); 

        $this->communes = Commune::all(); 
    }
    
    public function placeOrder(){

        // dd($this->selected_commune . " ". $this->livraison_type);

        $this->validate(); 
        // DB::beginTransaction();
        try{
            
            // register the client.

            $this->client->commune_id = $this->selected_commune;

            $this->client?->save(); 
            // Get the status
            $status = Status::where('name', "placed")->first(); 


            if($this->livraison_type =="tarif_domicile"){
                $type = "Domicile";
            }else{
                $type = "Stop desk";
            }

            // Create the order
            $order = Order::create([
                'code' => uniqid('order_'),
                "client_id" => $this->client->id,
                "status_id" => $status->id,
                "commune_id" => $this->selected_commune,
                "frai_livraison" => $this->frai_livraison(),
                "type_livraison" => $type,
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

            // Go to the confirmation page.
            redirect()->route('website.cart.confirmation');


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



    public function total_livraison(){
        if($this->selected_commune && $this->livraison_type){
            $com = Commune::find($this->selected_commune); 
            $cost = $com->{$this->livraison_type}; 
            return $this->total() + $cost ; 
        }else{
            return $this->total();
        }
    }


    public function frai_livraison(){
        if($this->selected_commune && $this->livraison_type){
            $com = Commune::find($this->selected_commune); 
            $cost = $com->{$this->livraison_type}; 
            return $cost ; 
        }else{
            return 0 ;
        }
    }

    protected $rules = [
        'client.nom' => 'required|string',
        'client.prenom' => 'required|string',
        'client.email' => 'required|email',
        'client.phone' => 'required|string',
        'client.adress' => 'required|string',
        'client.ville' => 'required|string',
        'selected_commune' => 'required|string',
        'livraison_type' => 'required|string',
    ];



    public function render()
    {
        return view('livewire.checkout-page');
    }
}
