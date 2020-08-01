<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

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
