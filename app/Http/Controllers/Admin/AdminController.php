<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use DB;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function getAllCategories()
    {
        // $categories = DB::table('categories')->get();
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function storeCategory(Request $request) {
        $validateData = $request -> validate([
            'name' => 'required |unique:categories| max: 255'
        ]);

        $data = array();
        $data['name'] = $request -> name;

        DB::table('categories') -> insert($data);

        $notification = array([
            'message' => 'The Category is added successfully!',
            'alert-type' => 'success'
        ]);

        return Redirect() -> back() -> with($notification);
    }

    public function deleteCategory($id) {
        $data = DB::table('categories') -> where('id', $id) -> delete();

        $notification = array([
            'message' => 'The Category is deleted successfully!',
            'alert-type' => 'success'
        ]);

        return Redirect() -> route('admin.categories') -> with($notification);
    }

    public function editCategory($id) {
        $cat = DB::table('categories') -> where('id', $id) -> first();
        return view('admin.edit_category', compact('cat'));
    }

    public function updateCategory(Request $request, $id) {
        $validateData = $request -> validate([
            'name' => 'required |unique:categories| max: 255'
        ]);

        $data = array();
        $data['name'] = $request -> name;

        $update = DB::table('categories') -> where('id', $id) -> update($data);

        if($update) {
            $notification = array([
                'message' => 'The Category is update successfully!',
                'alert-type' => 'success'
            ]);
            
        }
        //  else {
        //     $notification = array([
        //         'message' => 'Nothing is updated!',
        //         'alert-type' => 'warning'
        //     ]);
        //     return Redirect() -> route('admin.categories') -> with($notification);
        // }

        return Redirect() -> route('admin.categories') -> with($notification);
        
    }

    // POSTs

    public function getAllPosts()
    {
        $posts = DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->select('posts.*', 'categories.name') -> get();

        return view('admin.post', compact('posts'));
    }

    public function addPost() {
        $categories = DB::table('categories') -> get();
        return view('admin.create_post', compact('categories'));
    }

    public function storePost(Request $request) {
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

        DB::table('posts') -> insert($data);

        $notification = array([
            'message' => 'The Posts is addded successfully!',
            'alert-type' => 'success'
        ]);

        return Redirect() -> route('admin.posts') -> with($notification);

    }

    public function editPost($id) {

        $post = DB::table('posts') -> where('id', $id) -> first();
        $categories = DB::table('categories') -> get();

        return view('admin.edit_post', compact('post', 'categories'));
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

        return Redirect() -> route('admin.posts') -> with($notification);
    }

    public function deletePost($id) {

        DB::table('posts') -> where('id', $id) -> delete();

        $notification = array([
            'message' => 'The Posts is deleted successfully!',
            'alert-type' => 'success'
        ]);

        return Redirect() -> route('admin.posts') -> with($notification);

    }

    

    public function getAllComments()
    {
        return view('admin.comment');
    }

    public function getAllMedias()
    {
        return view('admin.media');
    }
}
