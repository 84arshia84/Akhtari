<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\MailRegister;
use App\Models\User;

use Doctrine\Common\Lexer\Token;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
//use SoapClient;
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

//        $client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
//        $user_sms = "";
//        $pass = "";
//        $fromNum = "+98100009";
//        $toNum = array("9360000994");
//        $pattern_code = "139";
//        $input_data = array( "tracking-code" => "1054 4-41","name" => "PAnel");
//
//        echo $client->sendPatternSms($fromNum,$toNum,$user,$pass,$pattern_code,$input_data);

        dispatch(new MailRegister($user));
        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);



    }
}
