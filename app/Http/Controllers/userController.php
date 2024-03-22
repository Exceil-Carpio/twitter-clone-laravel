<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
