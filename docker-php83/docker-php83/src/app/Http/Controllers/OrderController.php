<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'customer_address' => 'required|string',
            'total' => 'required|numeric',
            'items' => 'required|array',
        ]);

        $order = Orders::create([
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'total' => $request->total,
            'items' => $request->items,
        ]);

        return response()->json([
            'message' => 'Order placed successfully!',
            'order' => $order
        ], 201);
    }

    public function index()
    {
        return Orders::orderBy('id','desc')->get();
    }
}
