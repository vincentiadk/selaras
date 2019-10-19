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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/page/{slug}', 'PageController@view');
Route::get('/service/{category}/{slug}', 'ServiceController@view');
Route::get('/service/{category}', 'ServiceCategoryController@view');
Route::get('/blog', 'BlogController@index');
Route::get('/blog/{slug}', 'BlogController@view');
Route::get('/blog/category/{category}', 'BlogController@getByCategory');
Route::get('/blog/tag/{tag}', 'BlogController@getByTag');

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
	Route::get('/','admin\DashboardCont@index');
	Route::get('/page','admin\PageCont@index');
	Route::get('/page/list','admin\PageCont@list');
	Route::get('/page/edit/{id}','admin\PageCont@edit');
	Route::post('/page/submit/{id}','admin\PageCont@submit');
	Route::get('/page/delete/{id}','admin\PageCont@delete');

	Route::get('/user','admin\UserCont@index');
	Route::get('/user/list','admin\UserCont@list');
	Route::get('/user/edit/{id}','admin\UserCont@edit');
	Route::post('/user/submit/{id}','admin\UserCont@submit');
	Route::get('/user/delete/{id}','admin\UserCont@delete');

	Route::get('/blog','admin\BlogCont@index');
	Route::get('/blog/list','admin\BlogCont@list');
	Route::get('/blog/edit/{id}','admin\BlogCont@edit');
	Route::post('/blog/submit/{id}','admin\BlogCont@submit');
	Route::get('/blog/delete/{id}','admin\BlogCont@delete');

	Route::get('/service','admin\ServiceCont@index');
	Route::get('/service/list','admin\ServiceCont@list');
	Route::get('/service/edit/{id}','admin\ServiceCont@edit');
	Route::post('/service/submit/{id}','admin\ServiceCont@submit');
	Route::get('/service/delete/{id}','admin\ServiceCont@delete');
});
