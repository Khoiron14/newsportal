<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->hasRole('writer')) {
            return redirect()->back();
        }

        $post = auth()->user()->posts()->create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'content' => $request->content
        ]);

        if ($request->hasFile('image')) {
            $resource = $request->file('image');
            $name = $resource->getClientOriginalName();
            $resource->move(\base_path() ."/public/images", $name);
            $post->image()->create([
                'url' => $name
            ]);
        }

        $posts = Post::all();

        return redirect()->route('user.posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (!auth()->user()->hasRole('writer') && auth()->user()->isAuthor($post)) {
            return redirect()->back();
        }

        $post->update([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'content' => $request->content
        ]);

        if ($request->hasFile('image')) {
            $resource = $request->file('image');
            $name = $resource->getClientOriginalName();
            $resource->move(\base_path() ."/public/images", $name);
            $post->image()->create([
                'url' => $name
            ]);
        }

        return redirect()->route('posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->image()->delete();
        $post->delete();

        return redirect()->route('user.posts');
    }
}
