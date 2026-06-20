<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Models\Post;
use App\Models\Priority;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $post = Post::with('tags','priority')->simplePaginate(10);
        return view('post.index', compact('post'));
    }

    public function create()
    {
        $post = new Post();
        $priorities = Priority::select('id','name')->get();
        $tags = Tag::select('id','name')->get();

        return view('post.create', compact('post','priorities','tags'));
    }

    public function store(FormPostRequest $request)
    {
        $post = Post::create($request->validated());
        $post->tags()->sync($request->validated('tags'));

        return redirect()->route('post.index')->with('success','La tâche a bien été ajouté');
    }

    public function show(Post $post, string $slug)
    {
        if ($post->slug !== $slug) {
            return to_route('post.show', ['slug'=>$post->slug, 'post'=>$post->id]);
        }

        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $priorities = Priority::select('id','name')->get();
        $tags = Tag::select('id','name')->get(); 
        return view('post.create', compact('post','priorities','tags'));
    }

    public function update(FormPostRequest $request, Post $post)
    {
        $post->update($request->validated());
        $post->tags()->sync($request->validated('tags'));   
        return to_route('post.index')->with('success','Mise à jour de la tâche effectuée');
    }
}
