<?php

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blog/create', 'BlogController@create')->middleware('auth');
Route::post('/blog', 'BlogController@store')->middleware('auth');
Route::get('/blog', 'BlogController@getAll');
Route::get('/blog/{id}', 'BlogController@index');