<?php

namespace App\Http\Controllers;

use App\Models\Factor;
use Illuminate\Http\Request;

class FactorController extends Controller
{
    public function all_factor()
    {
        $factors = Factor::all();
        return response()->json(['factors' => $factors]);
    }

    public function add_Factor(FactorRequest $request)
    {
        $factor=Factor::create($request->validated());
        FactorSendEmail::dispatch($factor);
        return response()->json([
            'message' => 'Factor successfully added',
            'factor' => $factor
        ]);
    }

    public function find_factor($id)
    {
        $factor = Factor::find($id);
        return response()->json(['factor' => $factor]);
    }

    public function update_factor(Request $request,$id)
    {
        $factor = Factor::find($id);
        $factor->update($request->all());
        $factor->save();
        return response()->json([
            'message' => 'Factor successfully updated',
            'factor' => $factor
        ]);
    }

    public function delete_Factor(Factor $factor)
    {

        $factor->delete();
        return response()->json(['message' => 'Factor successfully deleted']);
    }
}
