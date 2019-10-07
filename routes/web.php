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

Route::get('/page/{slug}', 'PageController@view');
Route::get('/service/{category}/{slug}', 'ServiceController@view');
Route::get('/service/{category}', 'CategoryController@view');
Route::get('/blog', 'BlogController@index');
Route::get('/blog/{slug}', 'BlogController@view');
Route::get('/blog/category/{category}', 'BlogController@getByCategory');
Route::get('/blog/tag/{tag}', 'BlogController@getByTag');

Route::get('/admin','HomeController@indexAdmin');
