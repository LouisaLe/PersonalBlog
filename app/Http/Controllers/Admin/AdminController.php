<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use DB;

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

    // public function editCategory($id) {
    //     $cat = DB::table('categories') -> where('id', $id) -> first();
    //     return view('');
    // }





    public function getAllPosts()
    {
        return view('admin.post');
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
