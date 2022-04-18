<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return response()->json(
                ['message' => 'success'], 200
            );
        }

        throw ValidationException::withMessages([
            'name' => ['The provided credentials are incorrect'],
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(
            ['message' => 'Logged out'], 200
        );
    }
}
