<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
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

    public function store(Request $request, Post $post)
    {
        auth()->user()->comments()->create([
            'post_id' => $post->id,
            'text' => $request->text
        ]);

        return redirect()->back();
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();
        
        return redirect()->back();
    }
}
