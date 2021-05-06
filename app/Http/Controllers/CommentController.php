<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    function reply(Comment $comment, Request $request)
    {
        // todo validate reply

        if (!$comment->is_reply) {
            $reply = new Comment;

            $reply->user_id = Auth::user()->id;
            $reply->message = $request->comment;

            $comment->comments()->save($reply);
        }

        if ($request->redirect_url) {
            return redirect($request->redirect_url)
                ->with('success', __('Reply saved successfully'));
        }

        return back()->with('success', __('Reply saved successfully'));
    }
}
