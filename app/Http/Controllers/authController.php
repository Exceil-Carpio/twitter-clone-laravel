<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function login(){
        $credentials = request()->validate([
            'email' =>'required|email|exists:users,email',
            'password' => 'required'
        ]);

        if(auth()->attempt($credentials)){
            request()->session()->regenerate();

            return redirect()->route('index');
        }

        return back()->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ])->onlyInput('password');
    }

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
