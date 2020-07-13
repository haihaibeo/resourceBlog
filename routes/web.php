<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', 'BlogController@getAll')->name('home');
Route::get('/home', 'BlogController@getAll')->name('home');

Route::get('/blog', 'BlogController@getAll')->name('home');
Route::get('/blog/create', 'BlogController@create')->name('blog.create');
Route::post('/blog', 'BlogController@store')->middleware('auth');
Route::get('/blog/{id}', 'BlogController@index')->name('blog.show');
Route::get('/blog/{id}/edit', 'BlogController@edit')->name('blog.edit')->middleware('auth');
Route::get('/blog/{id}/delete', 'BlogController@destroy')->name('blog.destroy')->middleware('auth');  
Route::patch('/blog/{id}', 'BlogController@update')->name('blog.update')->middleware('auth');

Route::get('/search', 'BlogController@searchBlogs')->name('blog.find');

Route::get('/category/create', 'CategoryController@create');
Route::post('/category', 'CategoryController@store');

Route::post('/comment', 'CommentController@store');

Route::get('/category/{id}', 'BlogController@showByCategory');

Route::post('/like/{id}', 'LikeController@store')->name('like.store');