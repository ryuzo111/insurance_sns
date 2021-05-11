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

Route::get('/home', 'PostController@index')->name('home');
Route::get('/', 'PostController@top')->name('top');

Route::get('/index', 'PostController@index')->name('post.index');

Route::group(['prefix' => 'profile'], function () {
    Route::get('editForm', 'ProfileController@showEditForm')->name('profile.showEditForm');
    Route::post('edit', 'ProfileController@edit')->name('profile.edit');
    Route::get('profile', 'ProfileController@profile')->name('profile.profile');
    Route::get('detail/{user_id}', 'ProfileController@detail')->name('profile.detail');
});

Route::group(['prefix' => 'post', 'middleware' => 'auth:user'], function () {
    Route::get('postForm', 'PostController@showPostForm')->name('post.showPostForm');
    Route::post('post', 'PostController@post')->name('post.post');
    Route::get('delete', 'PostController@delete')->name('post.delete');
    Route::post('post_comment', 'PostController@postComment')->name('post.postComment');
    Route::get('post_form', 'PostController@commentForm')->name('post.commentForm');
                
    Route::get('comment_delete', 'PostController@commentDelete')->name('post.commentDelete');
    Route::get('comment_good', 'PostController@commentGood')->name('post.commentGood');
});
Route::get('/post/detail', 'PostController@detail')->name('post.detail');
Route::post('/post/search', 'PostController@search')->name('post.search');

Route::group(['prefix' => 'rank'], function () {
    Route::get('rank', 'RankController@rank')->name('rank.rank');
});

Route::group(['prefix' => 'caht', 'middleware' => 'auth:user'], function () {
    Route::get('index', 'ChatController@index')->name('chat.index');
    Route::get('chat', 'ChatController@chat')->name('chat.chat');
    Route::post('chatSend', 'ChatController@chatSend')->name('chat.send');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
    Route::get('index', 'AdminUserController@index')->name('user.index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
    Route::get('contact', 'ContactController@contactIndex')->name('contact.index');
    Route::get('contact/status', 'ContactController@contactChange')->name('contact.change');
    Route::get('logout', function () {
        return abort(404);
    });
});

Route::get('contact', 'ContactController@contactForm')->name('contact.contactForm');
Route::post('contact', 'ContactController@contact')->name('contact.contact');
