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

// Start of articles routes
Route::get('articles', 'ArticleController@index');
Route::get('articles/{id}', 'ArticleController@show');
// Routes that require to be signed-in
Route::middleware(['auth'])->group(function (){
    Route::get('article/create', 'ArticleController@create');
    Route::post('articles', 'ArticleController@store');
    Route::get('articles/{id}/edit', 'ArticleController@edit');
    Route::put('articles/{id}', 'ArticleController@update');
    Route::delete('articles/{id}', 'ArticleController@destroy');
});
// End of articles routes


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
