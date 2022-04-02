<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('website.post.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('website.post.form', ['post' => new Post()]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $media = $post->getMedia();
        return view('website.post.form', ['post' => $post, 'media' => $media]);
    }

    public function show(Post $post)
    {
        if (is_null($post->id)) $post = Post::where('slug', '/')->where('title', 'home')->first();
        if ($post->status == "draft") return abort(404);
        if ($post->slug == "blog") {
            $posts = Post::where('type', 'post')->where('status', 'published')->orderBy('created_at', 'desc')->get();
            return view('website.layouts.blog', ['posts' => $posts, 'page' => $post]);
        }
        return view('website.post.show', ['post' => $post]);
    }

    public function store(PostRequest $request)
    {
        $post = Post::create($request->validated());
        return redirect()->route('post.edit', $post->id)->with('success', 'Post Stored');
    }

    public function update(PostRequest $request, $id)
    {
        Post::find($id)->update($request->validated());
        return redirect()->back()->with('success', 'Post Updated');
    }
}
