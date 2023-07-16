<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AvisDetails extends Component
{

    public $avis ; 


    public function deleteAvis(){
        try{
            $this->avis->delete(); 
            session()->flash('success', "Le commentaire a bien été supprimé");
            return redirect()->route('admin.products.list');
        }catch(\Exception $error){
            session()->flash('success', "Un problème est survenu lors de la suppression. Contactez les developpeurs");
            return redirect()->route('admin.products.list');
        }
    }


    public function updateState(){
        try{

            if($this->avis->published == 1){
                dd('fefe'); 
                $this->avis->published = 0 ; 
                $this->avis->save(); 
                session()->flash('success', "Le commentaire a bien été modifier");
                return redirect()->route('admin.avis.details', ['id' => $this->avis->id]);
            }else if($this->avis->published == 0){
                $this->avis->published = 1 ; 
                $this->avis->save(); 
                session()->flash('success', "Le commentaire a bien été modifier");
                return redirect()->route('admin.avis.details', ['id' => $this->avis->id]);
            }


        }catch(\Exception $error){
            session()->flash('error', "Un problème est survenu lors de la modification. Contactez les developpeurs");
            return redirect()->route('admin.avis.details', ['id' => $this->avis->id]);
        }
    }

    public function render()
    {
        return view('livewire.avis-details');
    }
}
