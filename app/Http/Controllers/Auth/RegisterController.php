<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\MailRegister;
use App\Models\User;

use Doctrine\Common\Lexer\Token;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    public function register_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'family' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required',
            'national_id' => 'required',
            'password' => 'required|string|min:6',
        ]);
        $user = User::create($request->all());
        $token = $user->createToken('api_token')->plainTextToken;

        $role = Role::findByName("customer");
        $user->assignRole($role);

        dispatch(new MailRegister($user));
        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);



    }
}
