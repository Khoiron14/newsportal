<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        $posts = auth()->user()->posts()->latest()->paginate(5);

        return view('user.post', compact('posts'));
    }

    public function showRequestWriter()
    {
        return view('user.request-writer');
    }

    public function storeRequestWriter(User $user)
    {
        $user->requestWriter()->create();

        return redirect()->back();
    }
}
