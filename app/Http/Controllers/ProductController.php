<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $data = $request->safe()->except(['tags', "categories"]);
            $tags = $request->safe()->only(['tags']); 
            $categories = $request->safe()->only(['categories']);



            $product = Product::create([
                "name" => $data['name'],
                "code" => $data['code'],
                "qty" => $data['qty'],
                "price" => $data['price'],
                "short_desc"=> $data['short_desc'],
                "long_desc" => $data['long_desc'],
                "published" => $data['published'],
            ]);


            $this->putInTag($product->id, $tags['tags']) ;
            $this->putInCategory($product->id, $categories['categories']);
            

            return response()->json([
                "message" =>"The product was created successfuly !"
            ], 201);  
        }catch(\Exception $e){
            return response()->json([                
                'error' => "The product could not be created",
                "message" => "Please contact the support team",
            ], 500);
        }
    }


    /**
     * Handel the relation between the tags and the products
     * @param  $product_id The id of the created product
     * @param  $tags : the list of the tag passed from the form 
     */
    private function putInTag($product_id, $tags){
        foreach($tags as $tag){
            DB::insert('insert into product_tags (product_id, tags_id) values (?, ?)', [$product_id, $tag]);
        }
    }

    private function putInCategory($product_id, $categories){
        foreach($categories as $category){
            DB::insert('insert into category_product (product_id, category_id) values (?, ?)', [$product_id, $category]);
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
