<?php

namespace App\Http\Livewire;

use App\Models\Collection;
use Livewire\Component;

class CollectionCreation extends Component
{

        /**
 * ----------------------------------------------
 * START : Public declaration section
 * ----------------------------------------------
 */
public 
$name = "",
$small_desc = "", 
$collection =""; 

    /**
* ----------------------------------------------
* END : Public declaration section
* ----------------------------------------------
*/









         /**
 * ----------------------------------------------
 * START : Private declaration section
 * ----------------------------------------------
 */

 private function createCollection(){
    try{
        Collection::create([
            "name" => $this->name, 
            "desc" => $this->small_desc
        ]);

        $this->reset(['name', "small_desc"]); 
        // return success flash session
        session()->flash('success', 'La category a bien été créé !');
    }catch(\Exception $error){
        // Return session flash error
        session()->flash('error', 'Un problème est survenu lors de la creation. Contactez les développeur.');
    }
}





protected function rules()
{
    return [
        'name' => ['required', "max:50"],
        "small_desc" => ['required', "max:255"],
    ];
}





/**
* ----------------------------------------------
* END : Private declaration section
* ----------------------------------------------
*/


    /**
 * ----------------------------------------------
 * START : Event handler function
 * ----------------------------------------------
 */



 public function addCollection(){
    $this->validate(); 

     // Create the category
     $this->createCollection(); 
 }



     /**
* ----------------------------------------------
* END : Event handler function
* ----------------------------------------------
*/




    public function render()
    {
        return view('livewire.collection-creation');
    }
}
