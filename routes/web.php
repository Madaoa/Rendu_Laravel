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

Route::get('/home', 'HomeController@index');
Route::post('article/{id}/like', ['as' => 'article.like', 'uses' => 'ArticleController@like']);
Route::post('article/{id}/unlike', ['as' => 'article.unlike', 'uses' => 'ArticleController@unlike']);
Route::resource('/article', 'ArticleController');
Route::resource('/comment', 'CommentController');

//ADMIN
Route::resource('/admin', 'AdminArticleController');
Route::resource('/adminC', 'AdminCommentController');


Route::get('/user', function() {
    return view('user');
});



Route::get('/upload', function() {
    return View::make('imageupload');
});


