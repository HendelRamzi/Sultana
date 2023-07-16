<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Collection;
use Livewire\Component;

class CategorieCreation extends Component
{

        /**
 * ----------------------------------------------
 * START : Public declaration section
 * ----------------------------------------------
 */
    public 
        $name = "",
        $small_desc = "", 
        $collections = [], 
        $selected_collection = null ;


    public function mount(){
        $this->collections = Collection::all() ; 
    }

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

    private function createCategory(){
        try{
            Category::create([
                "name" => $this->name, 
                "desc" => $this->small_desc,
                "collection_id" => $this->selected_collection
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
            "selected_collection" => ['required'],
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



    public function addCategory(){
       $this->validate(); 

        // Create the category
        $this->createCategory(); 
    }



        /**
 * ----------------------------------------------
 * END : Event handler function
 * ----------------------------------------------
 */




    /**
 * ----------------------------------------------
 * START : Rendering section
 * ----------------------------------------------
 */

    public function render()
    {
        return view('livewire.categorie-creation');
    }

    /**
 * ----------------------------------------------
 * START : Rendering section
 * ----------------------------------------------
 */


 





}
