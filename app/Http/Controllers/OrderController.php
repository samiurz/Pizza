<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Order;
use App\OrderDetails;

class OrderController extends Controller
{
    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'street_address' => 'required',
            'suburb' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'delivery' => 'required',
            'quantity' => 'required',
            'total_amount' => 'required',
        ]);

        if ($validator->passes()) 
        {
            $order = Order::create($request->all());
            $orderDetails = []; 

            
            if($request->doubleCheese != null)
            {
                $orderDetails['doubleCheese'] = $request->doubleCheese;
            }

            if($request->doubleCheese != null)
            {
                $orderDetails['doubleCheese'] = $request->doubleCheese;
            }

            if($request->doubleVeggies != null)
            {
                $orderDetails['doubleVeggies'] = $request->doubleVeggies;
            }

            if($request->extraSauce != null)
            {
                $orderDetails['extraSauce'] = $request->extraSauce;
            }

            $orderDetails['delivery'] = $request->delivery;

            foreach ($orderDetails as $key => $value) 
            {
                OrderDetails::create(['order_id'=> $order->id, 'description' => $key, 'price' => $value ]);
            }

            return response()->json(['success'=>'Added new records.']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }
}
