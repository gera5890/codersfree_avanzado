<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::latest()->paginate();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormPostRequest $request)
    {
        //
        Post::create($request->all());
       
        return redirect()->route('posts.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //

        $categories = Category::all();
        return view('post.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormPostRequest $request, Post $post)
    {
        //Primer opcion de asignacion manual
        // $post = Post::findOrFail($post);
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->category_id = $request->category_id;
        // $post->save();

        //Asignacion masiva


        $post->update($request->all());

        return redirect()->route('posts.index');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post = Post::findOrFail($post);
        $message = $post->title;
        $post->delete();
        

        return redirect()->route('posts.index', $message);
    }
}
