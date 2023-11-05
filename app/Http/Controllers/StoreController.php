<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function add_store(Request $request)
    {
        $request->validate([
            'store_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'lat' => 'required|numeric',
            'long'=>'required|numeric'
        ]);
        $store = Store::create($request->all());
        return response()->json([
            'store' => $store
        ]);
    }
    public function delete_store (Request $request){
        Store::destroy($request->id);
        return response()->json('deleted');
    }
    public function all_store()
    {
        $store = Store::all();
        return response()->json([
            'all_product' => $store
        ]);
    }
    public function find_store (Request $request){
        $store =Store::find($request->id);
        return response()->json([
            'find_Store'=>$store
        ]);
    }
    public function update_store(Request $request,$id){
        $store= Store::find($id);
        $store->update($request->all());
        $store->save();
        return response()->json([
            'update_store'
        ]);
    }










}
