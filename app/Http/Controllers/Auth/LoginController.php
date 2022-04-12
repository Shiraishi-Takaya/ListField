<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use \Symfony\Component\HttpFoundation\Response;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            return response() -> json(
                ['status_code' => 200,'message' => 'success'], 200
            );
        } else {
            return response() -> json(
                ['status_code' => 500,'message' => 'Unauthorized'], 200
            );
        }
    }

    public function logout()
    {
        Auth::logout();
        return response() -> json(
            ['status_code' => 200, 'message' => 'Logged out'], 200
        );
    }
}
