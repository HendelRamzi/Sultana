<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagsController;
use App\Models\Temp_image;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::resource('cart', CartController::class); 


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('products', ProductController::class);
Route::resource('tags', TagsController::class);
Route::resource('categories', CategoriesController::class);

Route::resource('orders', OrderController::class); 

Route::prefix('image/')->group(function(){

    Route::post('process', function(Request $request){
        // dd($request->all()); 
        if($request->file('gallery')){
            
            $image  = $request['gallery'];  

            // Create the folder
            $folder = uniqid();

            // Store in the filesystem.
            Storage::disk('public')->putFile("/temp//".$folder, $image);
            // Store in the database.
            Temp_image::create([
                'folder' => $folder,
                "image" => $image->hashName()
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