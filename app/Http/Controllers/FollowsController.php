<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;

class FollowsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {

        return auth()->user()->following()->toggle($user->profile);
    }

    public function index(User $user)
    {
        return view('follows.index', compact('user'));
    }

    public function show(User $user)
    {

        //dd($user->following);

        return view('follows.show', compact('user'));
    }
}
