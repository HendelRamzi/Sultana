<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Temp_image;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ProductCreation extends Component
{



    // Input fields variable
    public $files = [] ; 
    
    public $thumb = null ; 
    public $categories = [], $collections = [] ; 

    public $name = "", $code= "", $qty = 1,
        $small_desc = "", 
        $price = 1, $status = "" , $collection ="",
        $cate, $content ="" ; 


    public function updatedCollection(){
        // Get collection's categories
        $this->categories = Category::where('collection_id', $this->collection)->get(); 
    }


    public function mount(){
        $this->collections = Collection::all();
        $this->cate = []; 
    }

    /**
     * Handel the relation between the tags and the products
     * @param  $product_id The id of the created product
     * @param  $categories : the list of the categories passed from the form 
     */
    private function putInCategory($product_id, $categories){
        try{
            if(is_array($categories)){
                foreach($categories as $category){
                    DB::insert('insert into category_product (product_id, category_id) values (?, ?)', [$product_id, $category]);
                }
            }else{
                DB::insert('insert into category_product (product_id, category_id) values (?, ?)', [$product_id, $categories]);
            }
        }catch(\Exception $error){
            // If error here delete the created product
            // And return an error
            Product::find($product_id)->delete(); 
            session()->flash(
                'processError', "Un problème est survenu lors de l'ajout a la catègorie. Contactez les developpeurs."
            );
            return redirect()->route('admin.products.create'); 
        }
    }




    private function processImages($product_id, $images){
        
        try{
            foreach($images as $image){
                
                $temp_file = Temp_image::where('folder', $image)->first();
                // dd($temp_file);
                Storage::disk('public')->copy('/temp//'.$image."/". $temp_file->image,
                    "products/gallery/".$temp_file->folder."/". $temp_file->image);
                
                $this->storeInDB($temp_file, $product_id);

                // $temp_file->delete(); 
                Temp_image::find($temp_file->id)?->delete(); 

            }
        }catch(\Exception $error){
            Product::find($product_id)->delete(); 
            session()->flash(
                'processError', 
                "ImagesProcess : ".$error->getMessage()
            );
            return redirect()->route('admin.products.create'); 
        }

    }



    private function storeInDB($image, $product_id){
        try{

            Gallery::create([
                'folder' => $image->folder,
                "image" => $image->image,
                "product_id" => $product_id,
                "alt" => "empty"
            ]);

        }catch(\Exception $error){
            Product::find($product_id)->delete(); 
            return response()->json([
                'error' =>  "Imagesstore : ".$error->getMessage()
            ]);
        }
    }






    public function addProduct(){

        // dd(gettype($this->status) ); 
        // dd($this->content); 
        // $this->validate();

        try{

            // get the image
            $temp_file = Temp_image::where('folder', $this->thumb)->first();

            // store in the folder
            Storage::disk('public')->copy('/temp//'.$temp_file->folder."/". $temp_file->image,
            "products/thumbnail/".$temp_file->folder.'/'.$temp_file->image);

            // Create the product
            $product = Product::create([
                "name" => $this->name,
                "code" => $this->code,
                "qty" => strval($this->qty),
                "price" => strval($this->price),
                "short_desc"=> $this->small_desc,
                "long_desc" => $this->content,
                "published" => $this->status,
                "folder" => $this->thumb,
                "thumb" => $temp_file->image
            ]);

            // Delete from the temp folder
            Temp_image::where('folder', $this->thumb[0])->delete();  


            $this->putInCategory($product->id, $this->cate);
            $this->processImages($product->id, $this->files);
    
            session()->flash("processSuccess" , "Le produit a bien étais créé");
            return redirect()->route('admin.products.create');
            //Reset all the inputs
        }catch(\Exception $error){
            session()->flash("processError" ,
                "addproduct :  ".$error->getMessage()
            );
            return redirect()->route('admin.products.create'); 
        }

    }
    




/**
 * -----------------------------------------------
 * START : Handle form validation
 * -----------------------------------------------
 */




    // Rules validations
    protected function rules()
    {
        return [
            'name' => ['required', "max:50"],
            'code' => ['required'],
            "qty" => ['required', "integer", "gt:0"],
            "price" => ['required', "integer", "gt:0"],
            "small_desc" => ['required', "max:255"],
            "content" => ['required'], 
            "thumb" => ['required'],
            "files" => ['required'],
            "status" => ['required', "boolean"],
            "collection" => ['required'],
            "cate" => ['required'],
        ];
    }


/**
 * -----------------------------------------------
 * END : Handle form validation
 * -----------------------------------------------
 */


/**
 * -----------------------------------------------
 * START : Handle event 
 * -----------------------------------------------
 */



    protected $listeners = [
        'addFile' => 'addFiles',
        "deleteFile" => "removeFiles",
        "addThumbnail" => "addThumbnail",
        "removeThumbnail" => "removeThumbnail",
        // "addProduct" => "addProduct",
    ];


    public function addThumbnail($data){
        // dd($data);
        $this->thumb = $data;
    }

    public function removeThumbnail($data){
        $this->thumb = null ; 
    }

    public function removeFiles($data){
        foreach($this->files as $i=> $file){
            if($file == $data){
                unset($this->files[$i]); 
            }
        }
    }

    public function addFiles($data){
        // dd($data); 
        array_push($this->files, $data);
    }


/**
 * -----------------------------------------------
 * END  : Handle event 
 * -----------------------------------------------
 */




    public function render()
    {
        return view('livewire.product-creation');
    }
}
