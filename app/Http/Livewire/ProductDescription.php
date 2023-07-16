<?php

namespace App\Http\Livewire;

use App\Models\Commentaire;
use Livewire\Component;

class ProductDescription extends Component
{

    public $product ; 

    public $content ;


    public $comms;

    public Commentaire $comment ; 


    public function sendComment(){
        $this->validate(); 
        try{
            
            // dd('fefefe');
            $this->comment->product_id = $this->product->id;
            $this->comment->published = 0 ;
            $this->comment->save(); 
            session()->flash('success', "Merci ! le commentaire a bien été envoyé !");
            // redirect()->route('products.show', ['product' => $this->product->id]);
        }catch(\Exception $error){
            session()->flash('error', "Merci ! le commentaire a bien été envoyé !");
            // redirect()->route('products.show', ['product' => $this->product->id]);
        }
    }



    protected $rules = [
        "comment.nom" => "required|string",
        "comment.email" => "required|email",
        "comment.message" => "required|string|max:255"
    ];





    public function mount(){
        $this->comment = new Commentaire() ;  
       

        $this->comms = $this->product->avis->where('published',"1") ; 
        // dd($this->comms); 
        $json = json_decode( $this->product->long_desc , true);
        $this->content = $json['blocks'] ;


        // dd($this->content ); 

    }

    public function render()
    {
        return view('livewire.product-description');
    }
}
