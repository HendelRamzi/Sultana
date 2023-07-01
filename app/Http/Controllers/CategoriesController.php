<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $categories = Category::with(['products'])->get();

            return CategoryResource::collection($categories)->response(); 

        }catch(\Exception $e){
            return response()->json([
                'error' => "Can not display the categories",
                "messages" => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCategoryRequest $request)
    {
        $data = $request->safe()->all(); 
        // dd($data);
        try{
            // Create the Category
            Category::create([
                'name' => $data['name'],
                'desc' => $data['desc'],
                'active' => $data['active'],
            ]);
            
            return response()->json([
                "messaage" => "the category was create successfuly",
            ], 201);

        }catch(\Exception $e){
            return response()->json([
                "error" => "problem when creating the category",
                "message" => $e->getMessage()
            ], 500);
        }


    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $category = Category::with(['products'])->find($id); 

            if(is_null($category)){
                throw new ModelNotFoundException(); 
            }

            return new CategoryResource($category); 
        }catch(ModelNotFoundException $error){
            return response()->json([
                'error' => "The tag could not be displayed",
                "message" => "The tag could not be found"
            ], 500);
        }catch(\Exception){
            return response()->json([
                'error' => "Problem when displaying the tag",
                "message" => $error->getMessage()
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
            $category = Category::find($id); 

            if(is_null($category)){
                throw new ModelNotFoundException(); 
            }

            $category->delete(); 

            return response()->json([
                'message' => "The tag was deleted successfuly"
            ],200);

        }catch(ModelNotFoundException $error){
            return response()->json([
                'error' => "The tag could not be Deleted",
                "message" => "The tag could not be found"
            ], 500);
        }catch(\Exception){
            return response()->json([
                'error' => "Problem when deleting the tag",
                "message" => $error->getMessage()
            ], 500);
        }
    }
}
