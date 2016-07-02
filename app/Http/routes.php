<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//register the authentication routes
Route::auth();

//homepage and view post routes
Route::get('/', 'PostController@index');
Route::get('/post/{post}', 'PostController@view');

//admin-related routes
Route::get('/admin', 'PostController@admin');
Route::get('/admin/create', 'PostController@showCreateForm');
Route::post('/admin/create', 'PostController@create');
Route::post('/admin/upload', 'PostController@upload');
Route::get('/admin/edit/{id}', 'PostController@showEditForm');
Route::post('/admin/edit/{id}', 'PostController@update');
Route::delete('/admin/delete', 'PostController@delete');

Route::get('/admin/settings', 'SettingsController@showSettings');
Route::post('/admin/settings', 'SettingsController@update');
