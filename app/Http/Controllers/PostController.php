<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Priorities;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        return view('post.index');
    }

    public function create()
    {
        $post = new Post();
        $priorities = Priorities::select('id','name')->get();
        $tags = Tag::select('id','name')->get();

        return view('post.create', compact('post','priorities','tags'));
    }
}
