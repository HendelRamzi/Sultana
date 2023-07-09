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
        // Cart::add([
        //     'id' => uniqid(), 
        //     "name" =>"Jus",
        //     "qty" => 2,
        //     "price" => 1.99,
        //     "weight" => "150"
        // ]); 
        // return"nice"; 
        // $items = Cart::content(); 
        return view('website.cart.index'); 
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



    public function checkout(){
        return view("website.cart.checkout"); 
    }


}
