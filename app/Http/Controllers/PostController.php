<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Comment;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function __construct() {
        $this->authorizeResource(Post::class, 'post');
    }

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

    public function comment(Post $post, Request $request)
    {
        // todo: request should be validated before saving

        $comment = new Comment;

        $comment->user_id = Auth::user()->id;
        $comment->message = $request->comment;

        $post->comments()->save($comment);

        return back()->with('success', __('Comments saved successfully'));
    }

    protected function resourceAbilityMap()
    {
        $abilityMap = parent::resourceAbilityMap();
        $abilityMap['uploadImage'] = 'update';
        $abilityMap['deleteImage'] = 'update';
        return $abilityMap;
    }
}
