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

Route::get('/', 'ArticleController@index')->name('main');

Route::resource('article', 'ArticleController');
Route::resource('admin', 'AdminController');
Route::resource('comment', 'CommentController');

Route::post('sort-date', 'ArticleController@sort_date');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


