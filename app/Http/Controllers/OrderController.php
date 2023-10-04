<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\Order;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function add_order(Request $request)
    {

//        if (User::where('id', '=', $request->user_id)->exists()) {
//            if (User::find($request->user_id)){
        $request->validate([ 'user_id' => 'required|exists:users,id',
             'product_id' => 'required|exists:products,id']);
                $order = Order::create($request->all());
            return response()->json([
                'add_order' => $order
            ]);
//        }else{
//            return response()->json(['data'=>'user_not_fond']);
//        }

    }


    public function all_order()
    {
        $order = Order::all();
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
        $order = Order::find($request->id);
        return response()->json([
            'find_order' => $order
        ]);
    }
}
