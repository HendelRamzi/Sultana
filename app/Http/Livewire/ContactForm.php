<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactForm extends Component
{

    public Contact $contact ; 




    public function mount(){
        $this->contact = new Contact() ; 
    }


    public function submitContact(){
        $this->validate(); 
        try{
            $this->contact->save(); 

            session()->flash('success', 'La message a bien été envoyé');
            redirect()->route('website.contact'); 
        }catch(\Exception $e){
            dd($e->getMessage()); 
        }
    }

    protected $rules = [
        'contact.nom' => "required|string", 
        "contact.prenom" => "required|string", 
        'contact.email' => "required|email",
        "contact.message" => "required|string"
    ];


    public function render()
    {
        return view('livewire.contact-form');
    }
}
