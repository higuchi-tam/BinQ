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

//第一引数にURL、第二引数にはどのコントローラーでなんのメソッドを実行するかを文字列で渡している
Route::get('/', 'PostsController@contents');

// Route::get('/', 'ArticleController@index');

Route::post('/login', 'LoginController@login');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


Auth::routes();

Route::get('/', 'ArticleController@index') -> name('articles.index');
Route::resource('/articles', 'ArticleController')->except(['index','show'])->middleware('auth');
Route::resource('/articles', 'ArticleController')->only(['show']);
Route::prefix('articles')->name('articles.')->group(function () {
    Route::put('/{article}/like', 'ArticleController@like')->name('like')->middleware('auth');
    Route::delete('/{article}/like', 'ArticleController@unlike')->name('unlike')->middleware('auth');
});
Route::get('/tags/{name}', 'TagController@show')->name('tags.show');

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'PostsController@contents');

//コンテンツ一覧画面
Route::get('/contents', 'PostsController@contents');

//コンテンツ詳細画面
Route::get('/contents_detail', 'PostsController@contents_detail');

//ユーザー一覧画面
Route::get('/user', 'PostsController@user');

//ユーザー詳細画面
Route::get('/user_detail', 'PostsController@user_detail');


//ユーザー編集画面
Route::get('/users/edit', 'UsersController@edit');
//ユーザ更新画面
Route::post('/users/update', 'UsersController@update');

// ユーザ詳細画面
Route::get('/users/{user_id}', 'UsersController@show');

// 投稿新規画面
Route::get('/posts/new', 'PostsController@new')->name('new');

// 投稿新規処理
Route::post('/posts', 'PostsController@store');

//投稿削除処理
Route::get('/postsdelete/{post_id}', 'PostsController@destroy');

//いいね処理
Route::get('/posts/{post_id}/likes', 'LikesController@store');

//いいね取消処理
Route::get('/likes/{like_id}', 'LikesController@destroy');

//コメントの投稿処理
Route::post('/posts/{comment_id}/comments', 'CommentsController@store');

//コメント取消処理
Route::get('/comments/{comment_id}', 'CommentsController@destroy');
