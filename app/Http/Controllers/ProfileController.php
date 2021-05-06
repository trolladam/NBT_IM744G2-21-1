<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->posts()->orderBy('created_at', 'asc')->paginate(8);
        return view('profile.show')->with(compact('user', 'posts'));
    }
}
