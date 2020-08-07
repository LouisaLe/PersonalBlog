<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('home', 'AdminController@index')->name('home');
    // category
    Route::get('categories', 'AdminController@getAllCategories')->name('categories');
    Route::post('store/categories', 'AdminController@storeCategory')->name('store.category');
    Route::get('edit/category/{id}', 'AdminController@editCategory');
    Route::post('update/category/{id}', 'AdminController@updateCategory');
    Route::get('delete/category/{id}', 'AdminController@deleteCategory');
    
    Route::get('comments', 'AdminController@getAllComments')->name('comments');
    Route::get('medias', 'AdminController@getAllMedias')->name('medias');
});


// post
Route::get('posts', 'PostController@getAllPosts')->name('posts');
Route::get('add/post', 'PostController@addPost')->name('add.post');
Route::post('store/post', 'PostController@storePost')->name('store.post');
Route::get('edit/post/{id}', 'PostController@editPost')->name('edit.post');
Route::post('update/post/{id}', 'PostController@updatePost');
Route::get('delete/post/{id}', 'PostController@deletePost')->name('delete.post');
Route::get('show/post/{id}', 'PostController@showPost')->name('show.post');


// comment

Route::post('add/comment', 'CommentController@addReply') -> name('add.reply');
