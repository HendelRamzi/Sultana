<?php

use App\Models\Category;
use App\Models\Client;
use App\Models\Collection;
use App\Models\Commentaire;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagsController;
use App\Models\Temp_image;
use Illuminate\Http\Request;

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



/**
 * ----------------------------------------------
 *  START : Authentification route
 * ----------------------------------------------
 */
Auth::routes();

/**
 * ----------------------------------------------
 *  END : Authentification route
 * ----------------------------------------------
 */



/**
 * ----------------------------------------------
 * START : Resources route
 * ----------------------------------------------
 */
Route::resource('cart', CartController::class); 
Route::resource('products', ProductController::class);
Route::resource('tags', TagsController::class);
Route::resource('categories', CategoriesController::class);
Route::resource('orders', OrderController::class); 
/**
 * ----------------------------------------------
 * END : Resources route
 * ----------------------------------------------
 */




/**
 * ----------------------------------------------
 *  START website route
 * ----------------------------------------------
 */
Route::get('/', function () {
    // les produits
    $products = Product::all(); 
    $collections = Collection::all();
    if(count($products) > 5){
        $banner_products = $products->slice(0,5);
    }



    return view('home', [
        'products' => $products,
        "collections" => $collections
    ]);
})->name('website.home');

Route::get('/contactez-nous', function(){
    return view('website.contact');
})->name('website.contact');


Route::get('/collection/{name}', function($name){
    // get the collection
    $collection = Collection::where('name', $name)->first(); 
    return view('website.collection.index', [
        'collection' => $collection
    ]); 
})->name("website.collection");


Route::get('/collection/category/{name}', function($name){
    // get the collection
    $category = Category::where('name', $name)->first(); 
    return view('website.collection.category', [
        'category' => $category
    ]); 
})->name("website.collection.category");



Route::get('/Qui-est-sultana', function(){
    return view('website.about');
})->name('website.about');


Route::get('checkout', [CartController::class, "checkout"])
->name('checkout'); 




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * ----------------------------------------------
 *  END website route
 * ----------------------------------------------
 */


/**
 * ----------------------------------------------
 *   START :  Filepond image process route
 * ----------------------------------------------
 */
Route::prefix('image')->group(function(){

    Route::post('process', function(Request $request){
        // dd($request->all()); 
        if($request->file('gallery') || $request->file('thumb')){
            
            if($request['gallery']){
                $image  = $request['gallery'];  
            }else{
                $image  = $request['thumb'];  
            }

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


    Route::post('process/gallery', function(Request $request){
        // dd(is_array($request['gallery'])); 
        if($request->file('gallery') || $request->file('thumb')){
            
            if($request['gallery']){
                if( is_array($request['gallery']) == true ){
                    // dd('lol');
                    $image  = $request['gallery'][0];  
                }else{

                    $image  = $request['gallery'];  
                }
            }
            else{
                $image  = $request['thumb'];  
            }

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
        // dd($request->getContent()); 
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

    Route::get('load/{folder}', function($folder){

        // The $folder will container the folder and the image name with the extension.
        // Get the folder name and the picture name
        $data = explode("-", $folder);
        //$data[0] => folder name
        // $data[1] => images name + extension
        $headers = [
            "Content-Disposition" => "inline"
        ];

        return Storage::disk('public')->download('/products/gallery/'.$data[0].'/'.$data[1]  ,$data[1], $headers);
    }); 

    Route::get('load/thumbnail/{folder}', function($folder){

        // The $folder will container the folder and the image name with the extension.
        // Get the folder name and the picture name
        $data = explode("-", $folder);
        //$data[0] => folder name
        // $data[1] => images name + extension
        $headers = [
            "Content-Disposition" => "inline"
        ];

        return Storage::disk('public')->download('/products/thumbnail/'.$data[0].'/'.$data[1]  ,$data[1], $headers);
    }); 
});

/**
 * ----------------------------------------------
 *  END :  Filepond image process route
 * ----------------------------------------------
 */



/**
 * ----------------------------------------------
 * START : Admin section route
 * ----------------------------------------------
 */

 Route::middleware("auth")->group(function () {
    Route::prefix('admin')->group(function(){

        
        Route::get('/', function(){
            return view('admin.dashboard'); 
        })->name('dashboard');
    
    
    
        /**
         * ----------------------------------------------
         *  START : Admin products routes
         * ----------------------------------------------
         */
    
        Route::get('products', function(){
            return view('admin.products.list');
        })->name('admin.products.list'); 
    
    
        Route::get('products/create', function(){
            return view('admin.products.create');
        })->name('admin.products.create');
    
        Route::get('products/{id}', function($id){
            try{
                $product = Product::find($id); 
                return view('admin.products.details', [
                    'product' => $product
                ]); 
            }catch(ModelNotFoundException $error){
                dd($error->getMessage());
            }catch(\Exception $error){
                dd($error->getMessage());
            }
        })->name('admin.products.details');


        Route::get('product/edit/{name}', function($name){
           
            try{
                $product = Product::where('name', $name)->first(); 
                return view('admin.products.edit', [
                    'product' => $product
                ]); 
            }catch(ModelNotFoundException $error){
                dd($error->getMessage());
            }catch(\Exception $error){
                dd($error->getMessage());
            }
        })->name('admin.products.edit');

        /**
         * ----------------------------------------------
         * END : Admin products routes
         * ----------------------------------------------
         */
    
    
    
    
    
    
         /**
         * ----------------------------------------------
         * START : Admin categories routes
         * ----------------------------------------------
         */
    
        
        Route::get('categories', function(){
            return view('admin.categories.list');
        })->name('admin.categories.list');
    
        
        Route::get('categories/create', function(){
            return view('admin.categories.create');
        })->name('admin.categories.create');
    
    
        Route::get('categories/{id}', function($id){
            $cat = Category::find($id); 
            return view('admin.categories.details', [
                'cat' => $cat
            ]);
        })->name('admin.categories.details');
    
    
         /**
         * ----------------------------------------------
         * END : Admin categories routes
         * ----------------------------------------------
         */
    
    
    
         /**
         * ----------------------------------------------
         * START : Admin collections routes
         * ----------------------------------------------
         */
            
            Route::get('collections', function(){
                return view('admin.collections.list');
            })->name('admin.collections.list');
    
            Route::get('collections/create', function(){
                return view('admin.collections.create');
            })->name('admin.collections.create');
    
            
            
            Route::get('collections/{id}', function($id){
                // get the collection
                try{
    
                    $collection = Collection::find($id); 
                    
                    return view('admin.collections.details',[
                        "collection" => $collection
                    ]);
    
                }catch(\Exception $error){
                    dd($error->getMessage());
                }
            })->name('admin.collections.details');
    
    
    
         /**
         * ----------------------------------------------
         * END : Admin collections routes
         * ----------------------------------------------
         */
    
    
        /**
         * ----------------------------------------------
         * START : Admin orders routes
         * ----------------------------------------------
         */
            
            Route::get('commandes', function(){
                return view('admin.orders.list');
            })->name('admin.orders.list');
    
            Route::get('commandes/{id}', function($id){
                // Get the order
                try{
                    $order = Order::find($id);
                    return view('admin.orders.details', [
                        'order'=> $order
                    ]);
    
                }catch(ModelNotFoundException $error){
                    dd($error->getMessage());
                }catch(\Exception $error){
                    dd($error->getMessage());
                }
            })->name('admin.orders.details');
    
    
        /**
         * ----------------------------------------------
         * END : Admin orders routes
         * ----------------------------------------------
         */
    
    
    
        /**
         * ----------------------------------------------
         * START : Admin clients routes
         * ----------------------------------------------
         */
                
            Route::get('clients', function(){
                return view('admin.clients.list');
            })->name('admin.clients.list');
                
            Route::get('clients/{id}', function($id){
                // get client 
                try{
                    $client = Client::find($id);
                    return view('admin.clients.details', [
                        'client'=> $client
                    ]);
    
                }catch(ModelNotFoundException $error){
                    dd($error->getMessage());
                }catch(\Exception $error){
                    dd($error->getMessage());
                }
            })->name('admin.clients.details');
    
    
    
        /**
         * ----------------------------------------------
         * END : Admin clients routes
         * ----------------------------------------------
         */
    
    
    
        /**
         * ----------------------------------------------
         * START : Admin contact routes
         * ----------------------------------------------
         */
                
         Route::get('contacts', function(){
            return view('admin.contacts.list');
        })->name('admin.contacts.list');
            
    
    
        Route::get('contacts/{id}', function($id){
            try{
                $contact = Contact::find($id);
                return view('admin.contacts.details', [
                    'contact' => $contact
                ]);
    
            }catch(ModelNotFoundException $error){
                dd($error->getMessage());
            }catch(\Exception $error){
                dd($error->getMessage());
            }
        })->name('admin.contacts.details');
    /**
     * ----------------------------------------------
     * END : Admin contact routes
     * ----------------------------------------------
     */
    
    

    
    /**
     * ----------------------------------------------
     * START : Admin avis routes
     * ----------------------------------------------
     */    
        Route::get('avis/{id}', function($id){
            try{
                $avis = Commentaire::find($id);
                return view('admin.avis.details', [
                    'avis' => $avis
                ]);
    
            }catch(ModelNotFoundException $error){
                dd($error->getMessage());
            }catch(\Exception $error){
                dd($error->getMessage());
            }
        })->name('admin.avis.details');
    /**
     * ----------------------------------------------
     * END : Admin avis routes
     * ----------------------------------------------
     */



    
    
    }); 
    
});



 


/**
 * ----------------------------------------------
 * END : Admin section route
 * ----------------------------------------------
 */