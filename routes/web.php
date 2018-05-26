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

//Article routes
Route::get('articles', 'ArticleController@index');
Route::get('articles/{id}', 'ArticleController@show');
Route::get('article/create', 'ArticleController@create');
Route::post('articles', 'ArticleController@store');
Route::get('articles/{id}/edit', 'ArticleController@edit');
Route::put('articles/{id}', 'ArticleController@update');
Route::delete('articles/{id}', 'ArticleController@destroy');

//Comments routes
Route::get('articles/{id}/comments', 'CommentController@index');
Route::get('articles/{id}/comments/create', 'CommentController@create');
Route::post('articles/{id}/comments', 'CommentController@store');
Route::get('articles/{id}/comments/{commentId}/edit', 'CommentController@edit');
Route::put('articles/{id}/comments/{commentId}', 'CommentController@update');
Route::delete('articles/{id}/comments/{commentId}', 'CommentController@destroy');

//auth routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
