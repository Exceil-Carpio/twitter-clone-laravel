<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function create(){
        $data = request()->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed|alpha_num',
        ]);

        User::create($data);

        return redirect()->route('login');
    }

    public function profile(){ //TODO: needs to be implemented
        return view('profile');
    }
}
