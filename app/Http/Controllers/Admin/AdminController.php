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
        return view('admin.post');
    }

    public function addPost() {
        $categories = DB::table('categories') -> get();
        return view('admin.create_post', compact('categories'));
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
