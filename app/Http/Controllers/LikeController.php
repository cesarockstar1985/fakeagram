<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post)
    {

        return auth()->user()->like()->toggle($post->id);
    }

    public function show(Post $post)
    {
        //dd($post->likes());

        return view('likes.show', compact('post'));
    }
}
