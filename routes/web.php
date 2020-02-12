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

Route::get('/', 'HomeController@index');

/** Route for categories CRUD**/
Route::get('category/create/', 'CategoryController@index')->name('category.create');
Route::post('category/store/', 'CategoryController@store')->name('category.store');
Route::get('category/all/', 'CategoryController@all')->name('category.all');
Route::get('category/delete/{id}', 'CategoryController@delete');
Route::get('category/edit/{id}', 'CategoryController@edit');
Route::post('category/update/{id}', 'CategoryController@update');



/** Route for posts CRUD**/
Route::get('post/create/', 'PostController@index')->name('post.create');
Route::post('post/store/', 'postController@store')->name('post.store');
Route::get('post/all/', 'PostController@all')->name('post.all');
Route::get('post/view/{id}', 'PostController@view');
Route::get('post/delete/{id}', 'postController@delete');
Route::get('post/edit/{id}', 'PostController@edit');
Route::post('post/update/{id}', 'PostController@update');