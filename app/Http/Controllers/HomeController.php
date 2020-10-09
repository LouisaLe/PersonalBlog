<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Comment;
use Mail;


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
        -> select('posts.*', 'categories.name') -> take(4) -> get();

        $cats = DB::table('categories') -> get();

        return view('home', compact(['posts', 'cats']));
    }

    public function postDetail($id) {
        $posts = DB::table('posts') -> get();
        $post = Post::find($id);
        $category = DB::table('categories') -> where('id', $post -> category_id) -> first();

        return view('detail_post', compact(['post', 'category', 'posts']));
    }

    public function allPost() {
        $posts = DB::table('posts')
        -> join('categories', 'posts.category_id', 'categories.id')
        -> select('posts.*', 'categories.name') -> paginate(10);

        $cats = DB::table('categories') -> get();

        return view('all_post', compact(['posts','cats']));
    }

    


    public function getAllPostsByCategory($category_id) {
        $posts = DB::table('posts') -> where('category_id', $category_id) -> paginate(10);
        $category_name = DB::table('categories') -> where('id', $category_id) -> first() -> name;
        return view('all_cate_posts', compact(['posts', 'category_name']));
    }

    public function contactViaEmail(Request $request) {

        $this->validate($request, ['name' => 'required', 'email' => 'required|email', 'message' => 'required|min:20']);

        $data = ['name' => $request->get('name') , 'email' => $request->get('email') , 'messageBody' => $request->get('message')];

        Mail::send('mail', $data, function ($message) use ($data)
        {
            $message->from($data['email'], $data['name']);
            $message->to('nhiltb3994@gmail.com', 'Admin')
                ->subject('Contact From Personal Blog');
        });

        return redirect()
            ->back()
            ->with('success', 'Thank you for your contact! I will reply you soon.');
    }
    
}


