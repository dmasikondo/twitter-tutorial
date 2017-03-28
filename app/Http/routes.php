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

/*Route::get('/', function () {
    return view('welcome');
})*/;

Route::auth();

Route::get('/', 'TimelineController@index');
Route::resource('posts','PostController');
Route::get('/users/followedby','UserController@followedby');
Route::get('/users/{user}','UserController@index');
Route::get('/users/{user}/follow','UserController@follow');
Route::get('/users/{user}/unfollow','UserController@unfollow');
Route::get('/todo', function(){
	return view ('/pages/todo');
});
