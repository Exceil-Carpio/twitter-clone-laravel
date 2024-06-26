<?php

namespace App\Http\Controllers;

use App\Models\idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $id =Auth::id();
        $ideas = idea::where('user_id', $id)->orderBy('created_at', 'DESC')->get();
        $users = DB::select('select id, name, username, email from users where id<>?', [Auth::id()]);

        return view('profile', compact('ideas', 'users', 'id'));
    }
}
