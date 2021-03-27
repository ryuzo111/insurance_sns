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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PostController@index')->name('post.index');

Route::group(['prefix' => 'profile'], function() {
				Route::get('editForm', 'ProfileController@showEditForm')->name('profile.showEditForm');
				Route::post('edit', 'ProfileController@edit')->name('profile.edit');
				Route::get('profile', 'ProfileController@profile')->name('profile.profile');
				Route::get('detail/{user_id}', 'ProfileController@detail')->name('profile.detail');
});

Route::group(['prefix' => 'post', 'middleware' => 'auth'], function() {
				Route::get('postForm', 'PostController@showPostForm')->name('post.showPostForm');
				Route::post('post', 'PostController@post')->name('post.post');
});
