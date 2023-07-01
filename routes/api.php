<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagsController;
use App\Models\Temp_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('products', ProductController::class);
Route::resource('tags', TagsController::class);
Route::resource('categories', CategoriesController::class);

Route::prefix('cart')->group(function(){
    Route::get('list', function(){

    }); 

    Route::get('item', function(){

    }); 


});

Route::prefix('image/')->group(function(){

    Route::post('process', function(Request $request){
        if($request->file('gallery')){
            
            $image  = $request['gallery'][0]; 

            // Create the folder
            $folder = uniqid();

            // Store in the filesystem.
            Storage::disk('local')->putFile("/temp//".$folder, $image);
            // Store in the database.
            Temp_image::create([
                'folder' => $folder,
                "image" => $image
            ]);

            return $folder;

        }
    });

    Route::delete('revert', function(Request $request){
        try{
            $temp_file = Temp_image::where('folder', $request->getContent())->first();
            $folder = $temp_file->folder ;
            if($temp_file){
                // Remove it from the temp folder
                Storage::disk('local')->deleteDirectory('/temp//'. $temp_file->folder) ;
                $temp_file->delete();
                return $folder ; 
            }
        }catch(\Exception $e){
            return response()->json([
                'error' => "Could not delete the image"
            ]);
        }
    });
});