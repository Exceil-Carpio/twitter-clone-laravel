<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FollowerController extends Controller
{
    // Needs to be updated to cater for all pages that uses it
    public function create(){
        $data = request()->validate([
            'user_id' => 'required',
        ]);

        Follower::create($data);

        $id =Auth::id();
        $ideas = idea::where('user_id', $id)->orderBy('created_at', 'DESC')->get();
        $users = DB::select('select id, name, username, email from users where id<>?', [Auth::id()]);

        return view('profile', compact('ideas', 'users', 'id'));
    }
}
