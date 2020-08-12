<?php

namespace App\Http\Controllers;
use DB;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = DB::table('posts')
        -> join('categories', 'posts.category_id', 'categories.id')
        -> select('posts.*', 'categories.name') -> get();
        return view('home', compact('posts'));
    }

    public function postDetail($id) {
        $post = Post::find($id);
        return view('detail_post', compact('post'));
    }

    
}
