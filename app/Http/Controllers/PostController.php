<?php

namespace App\Http\Controllers;

use App\Community;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function like(Post $post){
        dd($post);
        $post->likes += 1;
        $post->save();
    }

    public function dislike(Post $post){

    }

    public function index()
    {
        $posts = Post::whereNull('deleted_at')->orderBy('created_at','desc')->get();
        $communities = Community::whereNull('deleted_at')->get();
        return view('post.index', compact('posts','communities'));
    }

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5',
            'body' => 'required|max:300',
        ]);
        $post = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $validated['title'],
            'body' => $validated['body'],
            'community_id' => $request->community_id]);
        return redirect()->route('post.show', compact('post'));
    }


    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
