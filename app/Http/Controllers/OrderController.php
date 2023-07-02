<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\Status;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the list of all the orders
        try{
            $orders = Order::all(); 
            return response()->json([
                'orders' => $orders
            ]);
        }catch(\Exception $error){
            return response()->json([
                'error' => $error->getMessage()
            ]) ; 
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        try{
            // When created the order will be in a "placed" state
            $data = $request->safe()->except(['products']);
            $products = $request->safe()->only(['products']);
            // Take the products from the cart.


            // Create the order with the status, user and code
            $order  = Order::create([
                "code" => uniqid("order_"), 
                'user_id' => $data['user_id'],
                "status_id" => Status::where('name', "placed")->pluck('id')
            ]); 


            // Store the product with the order
            foreach($products as $product){
                // Store in the order_product table
                ProductOrder::create([
                    'product_id' => $product->id,
                    "order_id" => $order->id
                ]); 
            }

            
        }catch(\Exception $error){
            return response()->json([
                'error' => $error->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified order's status.
     */
    public function update(UpdateOrderRequest $request, string $order)
    {
        //Update only the status of the order
        
        try{
            // Check if the request status value is in the array

            $status = $request->validated(); 

            if(in_array($status, ['placed', 'confirmed', "paid", 'delivered', 'In progress'])){
                $order = Order::find($order); 
                $order->status_id = Status::where('name', $status)->pluck("id"); 

                return response()->json([
                    "success" => "Order status updated           successfuly"
                ]);
            }else{
                Throw new \Exception() ;
            }
        }catch(ModelNotFoundException $error){
            return response()->json([
                'error' => "The order could not be found."
            ]);
        }catch(\Exception $error){
            return response()->json([
                'error' => "Problem when updating the status. Please, contact the support team"
            ]); 
        }
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy(string $order)
    {
        try{
            $order  = Order::find($order) ; 

            // delete form the order_product
            $productsOrder = ProductOrder::where('order_id', $order->id)->toArray(); 
            foreach($productsOrder as $product){
                $productsOrder->delete(); 
            }

            // Delete the order
            $order->delete(); 

            return response()->json([
                'success' => "the Order was deleted successfuly"
            ]);
        }catch(ModelNotFoundException $error){
            return response()->json([
                'error' => "The order could not be found."
            ]);
        }catch(\Exception $error){
            return response()->json([
                'error' => "Problem when deleting the order. Please, contact the support team"
            ]);
        }
    }
}
