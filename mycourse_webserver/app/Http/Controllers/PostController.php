<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, post $post)
    {
        $request->validate([
            'txttitle' => ['required', 'string', 'max:255'],
            'txtcontent' => ['required', 'string'],
        ]);

        $post->title = $request->txttitle;
        $post->content = $request->txtcontent;

        $post->save();

        return redirect()->route('post.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'txttitle' => ['required', 'string', 'max:255'],
            'txtcontent' => ['required', 'string', 'max:255'],
        ]);

        $post->title = $request->txttitle;
        $post->content = $request->txtcontent;

        $post->update($request->all());
        return redirect()->route('post.show', $post->id)->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $data = Post::find($post->id);
        $data->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully.');
    }
}
