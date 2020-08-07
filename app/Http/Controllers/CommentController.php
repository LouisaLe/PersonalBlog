<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // store comment

    public function addReply(Request $request) {

        $comment = new Comment();
        $comment -> comment = $request -> comment;
        // form request for validate
        if (Auth::check()) {
           $comment -> user() -> associate($request -> user());
           $post =  Post::find($request  -> post_id);
           $post -> comments() -> save($comment);
           return back();
        } else {
            // do something
        }

    }

    // store replies
}
