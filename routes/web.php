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
Route::get('/', 'RankingController@new_ranking');
Route::get('posts/new', 'RankingController@new_post')->name('posts.new');
Route::get('posts/ranking', 'RankingController@ranking')->name('posts.ranking');
// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
//ユーザー機能
Route::group(['middleware' => 'auth'], function () {
    Route::get('timeline', 'PostsController@timeline')->name('timeline');
    Route::resource('users', 'UsersController', ['only' => ['edit', 'update']]);
    Route::post('users','UsersController@uploadUserIcon')->name('crop');
    Route::resource('posts', 'PostsController', ['only' => ['create', 'store','destroy']]);
    Route::group(['prefix' => 'posts/{id}'], function(){
        Route::resource('comments', 'CommentsController', ['only' => ['store']]);
        Route::post('bookmark', 'BookmarksController@store')->name('bookmarks.bookmark');
        Route::delete('unbookmark', 'BookmarksController@destroy')->name('bookmarks.unbookmark');
        Route::post('like', 'LikesController@store')->name('likes.like');
        Route::delete('unlike', 'LikesController@destroy')->name('likes.unlike');
    });
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
    });
});

Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
Route::resource('posts', 'PostsController', ['only' => ['index', 'show']]);
Route::resource('tags', 'TagsController', ['only' => ['index', 'show']]);
Route::group(['prefix' => 'users/{id}'], function () {
    Route::get('followings', 'UsersController@followings')->name('users.followings');
    Route::get('followers', 'UsersController@followers')->name('users.followers');
    Route::get('followers', 'UsersController@followers')->name('users.followers');
    Route::get('bookmarks', 'UsersController@bookmarks')->name('users.bookmarks');
 });