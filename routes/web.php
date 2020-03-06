<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts', 'PostController@index')->name('post.index');
Route::get('/posts/create', 'PostController@create')->name('post.create');
Route::get('/posts/{post}', 'PostController@show')->name('post.show');
Route::get('/posts/{id}/edit', 'PostController@edit')->name('post.edit');
Route::post('/posts/{id}/update', 'PostController@update')->name('post.update');
Route::delete('/posts/{id}/destroy', 'PostController@destroy')->name('post.destroy');


Route::post('/posts/{id}/comments', 'CommentController@store')
->middleware('auth')
->name('comments.store');

Route::post('/posts/store', 'PostController@store')->name('post.store');

Route::get('/profile/{user}', 'ProfileController@show')->name('userProfile.show');















