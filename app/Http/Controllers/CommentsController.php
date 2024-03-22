<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    public function create(){
        $id = request()->input('owner_id');
        $ideas = idea::where('user_id', $id)->orderBy('created_at', 'DESC')->get();
        $users = DB::select('select id, name, username, email from users where id<>?', [Auth::id()]);

        $data = request()->validate([
            'idea_id' => 'required',
            'user_id' => 'required',
            'comment' => 'required|string'
        ]);

        comments::create($data);

        if(Auth::id() == $id){
            return redirect()->route('index');
        }else{
            return view('viewPosts', compact('ideas', 'users', 'id'));
        }
    }
}
