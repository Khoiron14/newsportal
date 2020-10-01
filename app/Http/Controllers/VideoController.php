<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class VideoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:admin']); 
    }

    public function create()
    {
        return view('video.create');
    }

    public function store(Request $request)
    {
        Video::create([
            'url' => $request->url
        ]);

        return redirect()->route('admin.index');
    }

    public function destroy(Video $video)
    {
        $video->delete();

        return redirect()->back();
    }
}
