<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function posts()
    {
        $posts = auth()->user()->posts->reverse();

        return view('user.post', compact('posts'));
    }
}
