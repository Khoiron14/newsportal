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

Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::delete('/admin/request-writer/{user}/accept', 'AdminController@acceptWriter')->name('admin.writer.accept');
Route::delete('/admin/request-writer/{user}/decline', 'AdminController@declineWriter')->name('admin.writer.decline');

Route::get('/users/posts', 'UserController@posts')->name('user.posts');
Route::get('/users/request-writer', 'UserController@showRequestWriter')->name('user.request-writer.show');
Route::post('/users/request-writer/{user}', 'UserController@storeRequestWriter')->name('user.request-writer.store');

Route::resource('/posts', 'PostController');

Route::post('/posts/{post}/comments', "CommentController@store")->name('comment.store');
Route::delete('/posts/{post}/comments/{comment}', "CommentController@destroy")->name('comment.destroy');