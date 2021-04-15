<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // todo: use some logic to get featured topic for the day
        $featured_post = Post::inRandomOrder()->first();

        // todo: use some logic to get featured topic for the day
        $featured_topic = Topic::inRandomOrder()->first();

        $featured_topic_posts = $featured_topic->posts()->orderBy('created_at', 'desc')->limit(4)->get();

        $recent = Post::orderBy('created_at', 'desc')->paginate(6);

        return view('home')->with(compact('featured_post', 'featured_topic', 'featured_topic_posts', 'recent'));
    }
}
