<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Events\OrderPlaced;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'customer_name' => 'required|string',
            'product' => 'required|string',
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
        ]);

        // Create the order
        $order = Order::create($validatedData);


        // Dispatch OrderPlaced event
        event(new OrderPlaced($order));

        return response()->json(['message' => 'Order placed successfully!', 'order' => $order], 201);

    }
}
