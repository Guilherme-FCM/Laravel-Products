<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials))
            abort(401, 'Invalid credentials');

        $token = $request->user()->createToken();

        return response()->json([
            'token' => $token->plainTextToken
        ]);
    }
}
