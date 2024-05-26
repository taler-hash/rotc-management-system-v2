<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function login(LoginRequest $request) {
        $isAuthenticated = Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ]);
        
        if($isAuthenticated) {
            $user = User::where('username', $request->username)->first();
            $token = $user->createToken("ROTC Token", ['*']);

            return response()->json($token->plainTextToken);
        } else {
            return response()->json(['errors' => ['password' => ['Not Matched Credentials.']]], 422);
        }


    }
}
