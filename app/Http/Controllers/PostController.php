<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use App\Post;
use SebastianBergmann\Environment\Console;

class PostController extends Controller
{

    public function getAllPosts()
    {
        $posts = DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->select('posts.*', 'categories.name') -> get();

        return view('post.post', compact('posts'));
    }

    public function addPost() {
        $categories = DB::table('categories') -> get();
        return view('post.create_post', compact('categories'));
    }

    public function storePost(Request $request) {
        $validateData = $request -> validate([
            'category_id' => 'required',
            'title' => 'required',
            'detail' => 'required'
        ]);

        $data = array();
        // $data['user_id'] = auth() -> user() -> id;
        $data['category_id'] = $request -> category_id;
        $data['title'] = $request -> title;
        $data['excerpt'] = $request -> excerpt;
        $data['detail'] = $request -> detail;
        $data['tags'] = $request -> tags;
        $data['slug'] = Str::slug($request -> title,'-');

        DB::table('posts') -> insert($data);

        $notification = array([
            'message' => 'The Posts is addded successfully!',
            'alert-type' => 'success'
        ]);

        return Redirect() -> route('posts') -> with($notification);

    }

    public function editPost($id) {

        $post = DB::table('posts') -> where('id', $id) -> first();
        $categories = DB::table('categories') -> get();

        return view('post.edit_post', compact('post', 'categories'));
    }

    public function updatePost(Request $request, $id) {
        $validateData = $request -> validate([
            'category_id' => 'required',
            'title' => 'required',
            'detail' => 'required'
        ]);

        $data = array();
        $data['category_id'] = $request -> category_id;
        $data['title'] = $request -> title;
        $data['excerpt'] = $request -> excerpt;
        $data['detail'] = $request -> detail;
        $data['tags'] = $request -> tags;
        $data['slug'] = Str::slug($request -> title,'-');

        DB::table('posts') -> where('id', $id) -> update($data);

        $notification = array([
            'message' => 'The Posts is update successfully!',
            'alert-type' => 'success'
        ]);

        return Redirect() -> route('posts') -> with($notification);
    }

    public function deletePost($id) {

        DB::table('posts') -> where('id', $id) -> delete();

        $notification = array([
            'message' => 'The Posts is deleted successfully!',
            'alert-type' => 'success'
        ]);

        return Redirect() -> route('posts') -> with($notification);

    }

    public function showPost($id) {
        $post = Post::find($id);
        return view('post.show', compact('post'));
    }
}
