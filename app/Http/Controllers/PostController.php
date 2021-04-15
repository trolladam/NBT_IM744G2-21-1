<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Post;
use App\Models\Topic;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function show(Post $post)
    {
        return view('post.show')->with(compact('post'));
    }

    public function create()
    {
        $topics = Topic::all();
        return view('post.create')->with(compact('topics'));
    }

    public function store(PostRequest $request)
    {
        $post = Auth::user()
            ->posts()
            ->create($request->post);

        return redirect()
            ->route('post.edit', $post)
            ->with('success', __('Post created successfully'));
    }

    public function edit(Post $post)
    {
        $topics = Topic::all();
        return view('post.edit')->with(compact('post', 'topics'));
    }

    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->post);

        return redirect()
            ->route('post.edit', $post)
            ->with('success', __('Post updated successfully'));
    }

    public function uploadImage(Post $post, Request $request)
    {
        if (!$request->ajax()) {
            return abort(404);
        }

        $image = $request->file('image');
        $fileID = \uniqid();
        $filename = "/posts/{$fileID}.{$image->extension()}";

        Image::make($image)->save(public_path("/uploads/{$filename}"));

        $post->image = $filename;
        $post->save();

        return response()->json(['image' => $post->image]);
    }

    public function deleteImage(Post $post)
    {
        dd('todo delete image');
    }
}
