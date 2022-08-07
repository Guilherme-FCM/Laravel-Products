<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request, User $user){
        $userData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string'
        ]);

        $user = User::create($userData);
        if (! $user) abort(500, 'Error to create a user');

        $token = $user->createToken('auth');
        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken
        ]);
    }
}
