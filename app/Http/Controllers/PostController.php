<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use App\CustomHelpers;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::where('user_id', '!=', auth()->user()->id)->paginate(10);

        return View::make('post.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::get();
        return view('post.create', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Response $response)
    {
        $validated  = $request->validate([
            'title' => ['required', 'max:255'],
            'detail' => ['required', 'min:1'],
            'minPrice' => ['required'],
            'maxPrice' => ['required'],
            'tags' => ['required'],
        ]);

        $post = new Post();

        $post->title = $validated['title'];
        $post->detail = $validated['detail'];
        $post->minPrice = $validated['minPrice'];
        $post->maxPrice = $validated['maxPrice'];
        $post->tags = CustomHelpers::addTagIfNotExist($validated['tags']);
        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect()->route("my_posts");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view::make('post.edit', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tags::all();
        return view::make('post.edit', [
            'post' => $post,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validated  = $request->validate([
            'title' => ['required', 'max:255'],
            'detail' => ['required', 'min:1'],
            'minPrice' => ['required'],
            'maxPrice' => ['required'],
            'tags' => ['required'],
        ]);


        $post->title = $validated['title'];
        $post->detail = $validated['detail'];
        $post->minPrice = $validated['minPrice'];
        $post->maxPrice = $validated['maxPrice'];
        $post->tags = CustomHelpers::addTagIfNotExist($validated['tags']);
        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect()->route("my_posts");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
