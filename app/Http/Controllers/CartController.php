<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use Gloudemans\Shoppingcart\Exceptions\InvalidRowIDException;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a the cart list items
     */
    public function index()
    {
        // return a collection 
        $items = Cart::content(); 
        return CartResource::collection($items)
        ->response(); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            // Add to the cart 
            Cart::add([
                'id' => uniqid(), 
                "name" => $request['data']['name'],
                "qty" => $request['data']['qty'],
                "price" => $request['data']['price'],
                "weight" => $request['data']['weight']
            ]); 

            return response()->json([
                'success' => "The product was added to the cart"
            ]); 

        }catch(\Exception $e){
            return response()->json([
                'error' => "Could not add the item to the cart"
            ]); 
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $cart)
    {
        try{

            Cart::update($request['data']['item'], [
                "name" => $request['data']['name'],
                "qty" => $request['data']['qty'],
                "price" => $request['data']['price'],
                "weight" => $request['data']['weight']
            ]);

            return response()->json([
                'success' => "The item was updated in the cart"
            ]);

        }catch(InvalidRowIDException $error){
            return response()->json([
                'error' => "The product is not in the Cart"
            ]);
        }catch(\Exception $error){
            return response()->json([
                "error" => "Could not update the item in the cart"
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $cart)
    {
        try{
            Cart::remove($cart);

            return response()->json([
                'success' => "Product removed from the cart."
            ]);

        }catch(InvalidRowIDException $error){
            return response()->json([
                'error' => "The product is not in the Cart"
            ]);
        }catch(\Exception $e){
            return response()->json([
                'error' => "Could not delete the product from the cart."
            ]);
        }
    }
}
