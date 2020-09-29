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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/users/posts', 'UserController@posts')->name('user.posts');

Route::resource('/posts', 'PostController');

Route::post('/posts/{post}/comments', "CommentController@store")->name('comment.store');
Route::delete('/posts/{post}/comments/{comment}', "CommentController@destroy")->name('comment.destroy');