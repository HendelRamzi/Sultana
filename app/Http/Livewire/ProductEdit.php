<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\Temp_image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ProductEdit extends Component
{



    public $product ;

    public $files = [] ; 
    
    public $thumb = null ; 
    public $categories = [], $collections = [] ; 

    public  $content ; 


    // inputs names
    public $collection, $cate ;


    // public Product $p ; 



    public function updatedCollection(){
        // Get collection's categories
        $this->categories = Category::where('collection_id', $this->collection)->get(); 
    }


    public function addFile($data){
        array_push($this->files , $data); 
    }


    public function mount(){
        // $this->p = new Product(); 
        $this->content = $this->product->long_desc; 
        $this->collections = Collection::all();


    }


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
            session()->flash(
                'processError', "Un problème est survenu lors de l'ajout a la catègorie. Contactez les developpeurs."
            );
            return redirect()->route('admin.products.create'); 
        }
    }



    public function updateProduct($content, $gallery, $thumb){
        // dd($gallery); 
        $this->thumb = $thumb ; 
        $this->files = $gallery;
        $this->content = $content;

        $this->product->published = 1 ;
        $this->product->long_desc = $content ;

        if(explode("-", $this->thumb) == false){
            // new thumb image
            // get it from the 
            $temp_file = Temp_image::where('folder', $this->thumb)->first();
            Storage::disk('public')->copy('/temp//'.$temp_file->folder."/". $temp_file->image,
            "products/thumbnail/".$temp_file->folder.'/'.$temp_file->image);

            $this->product->folder = $temp_file->folder ; 
            $this->product->image = $temp_file->image ; 

           $temp_file?->delete(); 

        }


        $this->validate();

        $this->product->save(); 



        // handle the categories
        // dd($this->product->categories[0]->id);
        ProductCategories::where('category_id', $this->product->categories[0]->id)->delete(); 
        $this->putInCategory($this->product->id, $this->cate); 

        // dd($this->product->categories); 

        // Handle the galley images
        $images_folder = Gallery::where('product_id', $this->product->id)->pluck('folder')->toArray(); 
        $old_pic = []; 
        foreach($this->files as $image){
            if(explode('-', $image) != false){
                $x = explode('-', $image);
                array_push($old_pic , $x[0]); 
            }
        }
        $img_delete  = array_diff($images_folder , $old_pic); 
        
        // Delete the image from the database that the folder is not contained in the old images array
        foreach($img_delete as $img){
            Gallery::where('folder', $img)->delete(); 
        }


        // Add the new images.
        foreach($this->files as $image){
            if(explode('-', $image) == false){
                // new image
                $temp_file = Temp_image::where('folder', $image->folder)->first();
                Storage::disk('public')->copy('/temp//'.$temp_file->folder."/". $temp_file->image,
                "products/thumbnail/".$temp_file->folder.'/'.$temp_file->image);

                // store in db 
                Gallery::create([
                    'folder' => $image->folder,
                    "image" => $image->image,
                    "product_id" => $this->product->id,
                    "alt" => "empty"
                ]);

                // delete from temp
                $temp_file?->delete(); 
            }
        }

    }




    
    protected $listeners = [
        'updateProduct' => 'updateProduct',
    ];
    protected $rules = [
        'product.name' => ['required', "max:50"],
        'product.code' => ['required'],
        "product.qty" => ['required', "integer", "gt:0"],
        "product.price" => ['required', "integer", "gt:0"],
        "product.short_desc" => ['required', "max:255"],
        "product.long_desc" => ['required'],
        "product.folder" => ['required'],
        "product.thumb" => ['required'],
        "product.published" => ['required'],

        "content" => ['required'], 
        "thumb" => ['required'],
        "files" => ['required'],


        "collection" => ['required'],
        "cate" => ['required'],
    ];


    public function render()
    {
               
        return view('livewire.product-edit');
    }
}
