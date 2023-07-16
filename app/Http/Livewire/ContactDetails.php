<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactDetails extends Component
{

    public $contact;


    public function deleteContact(){
            $this->contact->delete(); 
            session()->flash("sucess", "
                message deleted successfully
            ");
        redirect()->route('admin.contacts.list'); 
    }

    public function render()
    {
        return view('livewire.contact-details');
    }
}
