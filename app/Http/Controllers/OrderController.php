<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function add_order(Request $request)
    {
        $order = Order::create($request->all());
        return response()->json([
            'add_order' => $order
        ]);
    }

    public function all_order()
    {
        $order=Order::all();
        return response()->json([
            $order]);
    }
    public function delete_order($id)
    {
        Order::destroy($id);
        return response()->noContent();
    }
    public function find_order(Request $request)
    {
        $order=Order::find($request->id);
        return response()->json([
           'find_order'=>$order
        ]);
    }
}
