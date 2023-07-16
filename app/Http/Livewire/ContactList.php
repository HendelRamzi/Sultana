<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactList extends Component
{


    public $contacts ; 

    public function mount(){
        $this->contacts = Contact::all(); 
    }


    public function deleteContact($id){
        try{
            Contact::find($id)->delete();
            session()->flash('success', 'La message a bien été supprimé');
            redirect()->back(); 
        }catch(\Exception $error){
            dd($error->getMessage()); 
        }
    }

    public function render()
    {
        return view('livewire.contact-list');
    }
}
