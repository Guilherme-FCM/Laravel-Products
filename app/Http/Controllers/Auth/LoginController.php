<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || $user->password != $request->password)
            abort(401, 'Invalid credentials');

        $token = $user->createToken('auth');
        return response()->json([
            'token' => $token->plainTextToken
        ]);
    }
}
