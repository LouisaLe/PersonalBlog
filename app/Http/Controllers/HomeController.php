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
        // $posts = Post::all();
        $category = DB::table('categories') -> where('id', $post -> category_id) -> first();

        return view('detail_post', compact(['post', 'category']));
    }

    public function allPost() {
        $posts = DB::table('posts')
        -> join('categories', 'posts.category_id', 'categories.id')
        -> select('posts.*', 'categories.name') -> get();
        // $posts = Post::with('category') -> get();
        // $posts = Post::with('category')->get();
        return view('all_post', compact('posts'));
    }


    public function getAllPostsByCategory($category_id) {
        $posts = DB::table('posts') -> where('category_id', $category_id) -> get();
        $category_name = DB::table('categories') -> where('id', $category_id) -> first() -> name;
        return view('all_cate_posts', compact(['posts', 'category_name']));
    }
    
}
