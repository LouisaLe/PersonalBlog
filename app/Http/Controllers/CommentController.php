<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    // store comment

    public function addComment(Request $request)
    {
        // form request for validate
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'comment' => 'required'
            ]);

            $comment = new Comment();
            $comment->comment = $request->comment;
            $comment->user()->associate($request->user());
            $post =  Post::find($request->post_id);
            $post->comments()->save($comment);
            return back();
        } else {
            // do something
            $validator = Validator::make($request->all(), [
                'guest_name' => 'required',
                'guest_email' => 'required',
                'comment' => 'required'
            ]);

            $comment = new Comment();
            $comment->guest_name = $request->guest_name;
            $comment->guest_email = $request->guest_email;
            $comment->comment = $request->comment;
            $post =  Post::find($request->post_id);
            $post->comments()->save($comment);
            return back();
        }
    }

    // store replies

    public function addReply(Request $request) {

        // form request for validate
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'comment' => 'required',
                'parent_id' => 'required'
            ]);

            $comment = new Comment();
            $comment->comment = $request->reply_comment;
            $comment->parent_id = $request->comment_id;
            $comment->user()->associate($request->user());
            $post =  Post::find($request->post_id);
            $post->comments()->save($comment);
            return back();

        } else {
            // do something
            $validator = Validator::make($request->all(), [
                'parent_id' => 'required',
                'guest_name' => 'required',
                'guest_email' => 'required',
                'comment' => 'required'
            ]);

            $comment = new Comment();
            $comment->comment = $request->reply_comment;
            $comment->guest_name = $request->guest_name;
            $comment->guest_email = $request->guest_email;
            $comment->parent_id = $request->comment_id;
            $post =  Post::find($request->post_id);
            $post->comments()->save($comment);
            return back();
        }
    }
}
