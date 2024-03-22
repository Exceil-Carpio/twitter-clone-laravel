<?php

namespace App\Http\Controllers;

use App\Models\idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ideaController extends Controller
{
    public function index(){
        $id =Auth::id();
        $ideas = idea::where('user_id', $id)->orderBy('created_at', 'DESC')->get();
        $users = DB::select('select id, name, username, email from users where id<>?', [Auth::id()]);

        return view('welcome', compact('ideas', 'users', 'id'));
    }

    public function create(Request $request){
        $data = $request->validate([
            'user_id'=> 'required',
            'content' => 'required|string',
        ]);

        idea::create($data);
        Session::Flash('success', 'Idea created successfully');

        return redirect()->route('index');
    }

    public function delete(idea $idea){
        $idea->delete();
        Session::Flash('success', 'Idea deleted successfully');
        return redirect()->route('index');
    }

    public function view_record(idea $idea){
        $users = DB::select('select id, name, username, email from users where id<>?', [Auth::id()]);
        return view('viewRecord', compact('idea', 'users'));
    }

    public function editMode(idea $idea, Bool $edit){
        $users = DB::select('select id, name, username, email from users where id<>?', [Auth::id()]);
        return view('viewRecord', compact('idea', 'edit', 'users'));
    }

    public function update(Request $request, idea $idea){
        $data = $request->validate([
            'content' =>'required|string',
        ]);

        $idea->update($data);
        $users = DB::select('select id, name, username, email from users where id<>?', [Auth::id()]);
        Session::Flash('success', 'Idea updated successfully');

        return view('viewRecord', compact('idea', 'users'));
    }

    public function search(){
        $id = request()->input('id');
        $ideas = idea::where('user_id', $id)->where('content', 'like', '%'.request()->input('search').'%')->get();
        $users = DB::select('select id, name, username, email from users where id<>?', [Auth::id()]);
        Session::Flash('self', true);

        if(Auth::id() == $id){
            return view('welcome', compact('ideas', 'users', 'id'));
        }

        return view('viewPosts', compact('ideas', 'users', 'id'));
    }

    public function getIdeas(int $id){
        $ideas = idea::where('user_id', $id)->orderBy('created_at', 'DESC')->get();
        $users = DB::select('select id, name, username, email from users where id<>?', [Auth::id()]);
        $owner = User::where('users.id', $id)->first();

        return view('viewPosts', compact('ideas', 'users', 'id', 'owner'));
    }
}
