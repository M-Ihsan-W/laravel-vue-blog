<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // $token = $request->user()->createToken($request->token_name);
            // $request->session()->regenerate();
            return response()->json(Auth::user(), Response::HTTP_OK);
            // $user = Auth::user();
            // return $user->createToken('token-name', ['server:update'])->plainTextToken;
        }
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorect.']
        ]);
    }

    public function logout()
    {
        Auth::logout();
    }
}
