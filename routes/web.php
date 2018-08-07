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

Route::get('/', 'ArticlesController@index')->name('main')->middleware('check_admin');
Route::get('add_article', 'ArticlesController@create');
Route::post('edit_article', 'ArticlesController@store');
//Route::post('article_update', 'ArticlesController@update');
Route::resource('article', 'ArticlesController');
Route::resource('admin', 'AdminController');
Route::resource('comment', 'CommentsController');

Route::post('sort_date', 'ArticlesController@sort_date');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/comments/{id}', 'CommentsController@index')->name('comments');
Route::post('storeComment', 'CommentsController@store');

