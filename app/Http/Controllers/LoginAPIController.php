<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Token;
use Illuminate\Support\Str;
use DateTime;
class LoginAPIController extends Controller
{
    //
    public function  login(Request $req){

        $user = Customer::where('name',$req->username)->where('password',$req->password)->first();
        
        if($user){
            $api_token = Str::random(64);
            $token = new Token();
            $token->userid = $user->id;
            $token->token = $api_token;
            $token->created_at = new DateTime();
            $token->save();
            return $token;
        }
        return "No user found";

    }
    public function  logout(Request $req){

        $token = Token::where('token',$req->token)->first();
        if($token){
            $token->expired_at =new DateTime();
            $token->save();
            return $token;
        }

    }


} 