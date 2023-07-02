<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\ProductTags;
use App\Models\Temp_image;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            // Get all the model
            $products = Product::with(['tags', "categories"])->get();
            return ProductResource::collection($products);

        }catch(\Exception $e){
            return response()->json([
                "error" => "
                    Problem when requesting the resource
                "
            ], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     * @param \App\Http\Requests\StoreProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProductRequest $request)
    {   
        try{
            // Get the validated data
            $data = $request->safe()->except(['tags', "categories", "images"]);
            $tags = $request->safe()->only(['tags']); 
            $categories = $request->safe()->only(['categories']);
            $images = $request->safe()->only(['images']);

            

            $product = Product::create([
                "name" => $data['name'],
                "code" => $data['code'],
                "qty" => $data['qty'],
                "price" => $data['price'],
                "short_desc"=> $data['short_desc'],
                "long_desc" => $data['long_desc'],
                "published" => 1,
            ]);


            $this->putInTag($product->id, $tags['tags']) ;
            $this->putInCategory($product->id, $categories['categories']);
            
            // Handle the images 
            /**
             * ! Add the images compression logic 
             */
            $this->processImages($product->id, $images['images']); 


            return response()->json([
                "message" =>"The product was created successfuly !"
            ], 201);  
        }catch(\Exception $e){
            return response()->json([                
                'error' => "The product could not be created",
                "message" => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Handel the relation between the tags and the products
     * @param  $product_id The id of the created product
     * @param  $tags : the list of the tag passed from the form 
     */
    private function putInTag($product_id, $tags){
        try{
            foreach($tags as $tag){
                DB::insert('insert into product_tags (product_id, tags_id) values (?, ?)', [$product_id, $tag]);
            }
        }catch(\Exception $error){
            // If error here delete the created product
            // And return an error
            Product::find($product_id)->delete(); 
            return response()->json([
                'error' => "Problem when adding the tags. Please contact the support team"
            ]);
        }
    }

    private function putInCategory($product_id, $categories){
        try{
            foreach($categories as $category){
                DB::insert('insert into category_product (product_id, category_id) values (?, ?)', [$product_id, $category]);
            }
        }catch(\Exception $error){
            // If error here delete the created product
            // And return an error

            Product::find($product_id)->delete(); 
            return response()->json([
                'error' => "Problem when adding the categories. Please contact the support team"
            ]);
        }
    }

    private function processImages($product_id, $images){
        
        try{
            foreach($images as $image){
               
                
                $temp_file = Temp_image::where('folder', $image)->first();
                Storage::disk('public')->copy('/temp//'.$image."/". $temp_file->image,
                                "products/".$temp_file->folder);
                
                $this->storeInDB($temp_file, $product_id);

                $temp_file->delete(); 

            }
        }catch(\Exception $error){
            Product::find($product_id)->delete(); 
            return response()->json([
                "error" => "Problem when uploading the images. Please, contact the support team"
            ]);
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
                'error' => "Problem when storing image to the database. Please, contact the support team"
            ]);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{

            $product =Product::with(['tags', "categories"])->find($id) ; 
            if(is_null($product)){
                throw new ModelNotFoundException() ;
            }

            return (new ProductResource($product));
        }catch(ModelNotFoundException $error){
            return response()->json([
                'error' => "Product could not be displayed",
                "message" => "The product could not be found",
            ],500);
        }catch(\Exception $e){
            return response()->json([
                'error' => "Product could not be displayed",
                "message" => "A problem occured when desplaying the product. Please contact the support team",
            ], 500);
        }
    }


    /**
     * Update the specified Product in storage.
     */
    public function update(UpdateProductRequest $request, string $product)
    {

        // Update products
        try{

            // Get the form data
           // Get the validated data
           $data = $request->safe()->except(['tags']);
           $tags = $request->safe()->only(['tags']); 
           $categories = $request->safe()->only(['categories']);
        //    $images = $request->safe()->only(['images']);

        // dd($tags); 

            $product  = Product::find($product); 

            $product->name = $data['name']; 
            $product->price = $data['price']; 
            $product->qty = $data['qty'];
            $product->short_desc = $data['short_desc']; 
            $product->long_desc = $data['long_desc']; 

            $product->save() ; 

            // Handle the tags changes 
            $this->handleTagUpdate( $product->id ,$tags['tags']); 
            $this->handleCategoriesUpdate($product->id, $categories['categories']); 


            

        }catch(ModelNotFoundException $error){
            return response()->json([
                'error' => "Model could not be found"
            ]);
        }catch(\Exception $error){
            return response()->json([
                'error' => $error->getMessage()
            ]); 
        }
    }

    public function handleTagUpdate($product_id,$tags){

        // Update the tags
        $tags_DB = ProductTags::where("product_id",$product_id)
        ->pluck("tags_id")->toArray();
        
        $tag_deleted = array_diff($tags_DB, $tags);

        // delete the tags
        if(is_array($tag_deleted)){
            foreach($tag_deleted as $tag){
                ProductTags::where("tags_id", $tag_deleted)->delete(); 
            }
        }else{
            ProductTags::where("tags_id", $tag_deleted)
            ->delete(); 
        }

        // Add the tags
        if(is_array($tags)){
            foreach($tags as $tag){
                if(! in_array($tag , $tags_DB)){
                    ProductTags::create([
                        'product_id' => $product_id,
                        "tags_id" => $tag 
                    ]); 
                }
            }
        }else{
            if(! in_array($tag , $tags_DB)){
                ProductTags::create([
                    'product_id' => $product_id,
                    "tags_id" => $tags 
                ]);
            }

        }

    }

    public function handleCategoriesUpdate($product_id, $categories){
        $categoy_DB  = ProductCategories::where('product_id', $product_id)->pluck('category_id')->toArray(); 
        $categories_deleted = array_diff($categoy_DB, $categories);

        // Delete the missing categories
        if(is_array($categories_deleted)){
            foreach($categories_deleted as $cat){
                ProductCategories::where('category_id', $cat)->delete(); 
            }
        }else{
            ProductCategories::where('category_id', $categories_deleted)->delete(); 
        }

        // Add the new tags
        if(is_array($categories)){
            foreach($categories as $cat){
                if(! in_array($cat , $categoy_DB)){
                    ProductCategories::create([
                        'product_id' => $product_id,
                        "category_id" => $cat
                    ]);
                }
            }
        }else{
            if(! in_array($categories , $categoy_DB)){
                ProductCategories::create([
                    'product_id' => $product_id,
                    "category_id" => $categories
                ]);
            }
        }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{

            $product = Product::find($id);

            if(is_null($product)){
                throw new ModelNotFoundException() ;
            }

            $product->delete(); 


            /**
             * TODO Delete the tags
             * TODO Delete the categories
             * TODO Delete the images
             */

            return response()->json([
                "message" => "The product was deleted successufly",
            ], 202);

        }catch(ModelNotFoundException $error){
            return response()->json([
                'error' => "Product could not be deleted",
                "message" => "The product could not be found",
            ],500);
        }catch(\Exception $e){
            return response()->json([
                'error' => "Product could not be deleted",
                "message" => "A problem occured when deleting the product. Please contact the support team",
            ], 500);
        }
    }
}
