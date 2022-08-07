<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request, User $user){
        $userData = $request->only('name', 'email', 'password');

        $user = $user->create($userData);
        if (! $user)
            abort(500, 'Error to create a user');

        return response()->json([
            'user' => $user
        ]);
    }
}
