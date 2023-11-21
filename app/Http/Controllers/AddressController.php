<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function add_address(Request $request)
    {
        $request->validate([

            'lat'=> 'required|numeric',
            'long'=>'required|numeric',
            'address'=>'required|string|max:225',
            'name'=>'required|string|max:225',
            'City'=>'required|string|max:225',
            'district'=>'required|string|max:225',// ناحیه
            'Plaque'=>'required|string|max:225',
            'the unit '=>'required|string|max:225',
            'Recipients name'=>'required|string|max:225',
            'Recipients last name'=>'required|string|max:225',
            'phone number'=>'required|string|max:225'
        ]);
        $address=Address::create($request->all());
        return response()->json([
            'addresses'=>$address
        ]);
    }
    public function delete_address(Request $request)
    {
        Address::destroy($request->id);
        return response()->json('deleted');
    }
    public function all_address(Request $request)
    {
        $address=Address::all();
        return response()->json([
            'all_address'=>$address
        ]);
    }
    public function find_address(Request $request)
    {
        $address=Address::find($request->id);
        return response()->json([
            'find_address'=>$address
        ]);
    }
    public function update_address(Request $request,$id)
    {
        $address=Address::find($id);
        $address->update($request->all());
        $address->save();
        return response()->json([
            'update_address'
        ]);

    }
}
