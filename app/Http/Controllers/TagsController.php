<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostTagRequest;
use App\Http\Resources\TagResource;
use App\Models\Tags;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{

            $tags = Tags::with(['products'])->get(); 
            return TagResource::collection($tags);
        }catch(\Exception $e){
            return response()->json([
                'error' => "Can not display the tags",
                "messages" => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PostTagRequest $request)
    {
        $data = $request->safe()->all(); 
        try{

            // Create the tag
            Tags::create([
                "name" => $data['name'],
                "icon" => null, 
                "folder" => null
            ]);

            return response()->json([
                "messaage" => "the tag was create successfuly",
            ], 201);

        }catch(\Exception $e){
            return response()->json([
                "error" => "problem when creating the tag",
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
            $tag = Tags::with(['products'])->find($id); 

            if(is_null($tag)){
                throw new ModelNotFoundException(); 
            }

            return new TagResource($tag); 
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
            $tag = Tags::find($id); 

            if(is_null($tag)){
                throw new ModelNotFoundException(); 
            }

            $tag->delete(); 

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
