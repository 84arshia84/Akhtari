<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add_product(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'price' => 'integer|required',
            'number' => 'integer|required'
        ]);
//        dd($request);
        $product = Product::create($request->all());
        return response()->json([
            'product' => $product,
        ]);
    }
    public function delete_product(Request $request){
        Product::destroy($request->id);
        return response()->json("deleted");
    }
    public function all_product (Request $request){
        $product = Product::all();
        return response()->json([
            'all_product'=>$product
        ]);
    }
    public function find_product (Request $request){
        $product =Product::find($request->id);
        return response()->json([
            'find_product'=>$product
        ]);
    }
    public function update_product(Request $request,$id){
        $product= Product::find($id);
        $product->update($request->all());
        $product->save();
        return response()->json([
            'update_product'
            ]);
    }
}
