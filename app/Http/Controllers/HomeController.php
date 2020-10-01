<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Video;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        $videos = Video::all();

        return view('home', compact('posts', 'videos'));
    }

    public function search(Request $request)
    {
        $keyword=$request->keyword;

        if ($keyword == null) {
            return redirect()->back();
        }

        $posts = Post::where('title','like',"%".$keyword."%")->latest()->paginate(5);
        
        return view('search', compact('posts', 'keyword'));
    }
}
