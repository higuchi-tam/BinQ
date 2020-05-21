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

Auth::routes();

//SNSログイン
Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', 'ArticleController@index')->name('articles.index');
Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth');
Route::resource('/articles', 'ArticleController')->only(['show']);
Route::get('/likeIndex', 'ArticleController@likeIndex')->name('likeIdex');
Route::prefix('articles')->name('articles.')->group(function () {
    Route::put('/{article}/like', 'ArticleController@like')->name('like')->middleware('auth');
    Route::delete('/{article}/like', 'ArticleController@unlike')->name('unlike')->middleware('auth');
    Route::get('/card_side', 'ArticleController@card_side')->name('card_side');
    Route::post('/ajaxImgUpload', 'ArticleController@ajaxImgUpload')->name('ajaxImgUpload');
});
//コメント
Route::post('/comment/{article_id}/store', 'CommentsController@store')->name('comments.store');
Route::post('/comment/{id}/delete', 'CommentsController@destroy')->name('comments.destroy');
Route::post('/comment/{id}/update', 'CommentsController@update')->name('comments.update');

Route::get('/tags/{name}', 'TagController@show')->name('tags.show');

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::get('/{name}', 'UserController@show')->name('show');
    Route::get('/{name}/edit', 'UserController@edit')->name('edit');
    Route::patch('/{name}/update', 'UserController@update')->name('update');
    Route::get('/{name}/likes', 'UserController@likes')->name('likes');
    Route::get('/{name}/draft', 'UserController@draft')->name('draft');
    Route::get('/{name}/followings', 'UserController@followings')->name('followings');
    Route::get('/{name}/followers', 'UserController@followers')->name('followers');
    Route::post('/ajaxImgUpload', 'UserController@ajaxImgUpload')->name('ajaxImgUpload');

    Route::middleware('auth')->group(function () {
        Route::put('/{name}/follow', 'UserController@follow')->name('follow');
        Route::delete('/{name}/follow', 'UserController@unfollow')->name('unfollow');
    });
});

Route::get('/post', 'PostsController@index')->name('post.index');
