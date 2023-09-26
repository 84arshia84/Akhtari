<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function add_user(Request $request)
    {
            $request->validate([
                'name' => 'required|string|max:255',
                'family' => 'required|string|max:255',
                'middle_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone_number' => 'required',
                'national_id' => 'required',
                'password' => 'required|string|min:6'
            ]);
        $user = User::create($request->all());
        return response()->json([
            'add_user' => $user,
        ]);
    }

    public function delete_user(Request $request)
    {
//        User::destroy($request->id);
//        return response()->noContent();
        $user = User::find($request->id);
        $user->delete();
    }

    public function all_users()
    {
        $users = User::all();
        return response()->json([
            'data' => $users
        ]);
    }

    public function find_user(Request $request)
    {
        $user = User::find($request->id);
        return response()->json([
            'find_user' => $user
        ]);

    }

    public function update_user(Request $request,$id){
        $user = User::find($id);
        $user->update($request->all());
        $user->save();
        return response()->json([
            'update_user'
        ]);
    }
}
