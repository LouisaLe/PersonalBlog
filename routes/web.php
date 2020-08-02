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
    Route::post('edit/categories/{id}', 'AdminController@editCategory');
    Route::get('delete/category/{id}', 'AdminController@deleteCategory');
    
    // post
    Route::get('posts', 'AdminController@getAllPosts')->name('posts');
    Route::get('comments', 'AdminController@getAllComments')->name('comments');
    Route::get('medias', 'AdminController@getAllMedias')->name('medias');
});
