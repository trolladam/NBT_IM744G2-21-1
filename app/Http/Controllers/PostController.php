<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
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

        dd($post);
    }
}
