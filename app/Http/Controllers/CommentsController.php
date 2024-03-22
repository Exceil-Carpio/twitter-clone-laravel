<?php

namespace App\Http\Controllers;

use App\Models\comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function create(){

        $data = request()->validate([
            'idea_id' => 'required',
            'user_id' => 'required',
            'comment' => 'required|string'
        ]);

        comments::create($data);
        return redirect()->route('index');
    }
}
