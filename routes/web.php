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

//TOPページ

Route::get('/articles', 'ArticleController@index')->name('articles.index');
Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth');
Route::resource('/articles', 'ArticleController')->only(['show']);
Route::get('/likeIndex', 'ArticleController@likeIndex')->name('likeIndex');
Route::prefix('articles')->name('articles.')->group(function () {
    Route::put('/{article}/like', 'ArticleController@like')->name('like')->middleware('auth');
    Route::delete('/{article}/like', 'ArticleController@unlike')->name('unlike')->middleware('auth');
    Route::get('/card_side', 'ArticleController@card_side')->name('card_side');
    Route::post('/ajaxImgUpload', 'ArticleController@ajaxImgUpload')->name('ajaxImgUpload');
    Route::post('/ajaxUpdate', 'ArticleController@ajaxUpdate')->name('ajaxUpdate');
});
//コメント
Route::prefix('comment')->name('comments.')->group(function () {
    Route::post('/{article_id}/store', 'CommentsController@store')->name('store');
    Route::post('/{id}/delete', 'CommentsController@destroy')->name('destroy');
    Route::post('/{id}/update', 'CommentsController@update')->name('update');
    Route::put('/{comment}/like', 'CommentsController@like')->name('like')->middleware('auth');
    Route::delete('/{comment}/like', 'CommentsController@unlike')->name('unlike')->middleware('auth');
});

Route::get('/tags/{name}', 'TagController@show')->name('tags.show');

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::get('/{name}', 'UserController@show')->name('show');
    Route::get('/{name}/edit', 'UserController@edit')->name('edit');
    Route::patch('/{name}/update', 'UserController@update')->name('update');
    Route::get('/{name}/likes', 'UserController@likes')->name('likes');
    Route::get('/{name}/draft', 'UserController@draft')->name('draft')->middleware('auth');
    Route::get('/{name}/followings', 'UserController@followings')->name('followings');
    Route::get('/{name}/followers', 'UserController@followers')->name('followers');
    Route::post('/ajaxImgUpload', 'UserController@ajaxImgUpload')->name('ajaxImgUpload');

    Route::middleware('auth')->group(function () {
        Route::put('/{name}/follow', 'UserController@follow')->name('follow');
        Route::delete('/{name}/follow', 'UserController@unfollow')->name('unfollow');
    });
});

Route::prefix('likes')->name('likes.')->group(function () {
    Route::get('/articles/{id}', 'LikesController@articles')->name('articles');
    Route::get('/comments/{id}', 'LikesController@comments')->name('comments');
});

Route::get('/post', 'PostsController@index')->name('post.index');

Route::get('/', 'HomeController@index')->name('home');

// メールアドレス確認メールを送信
Route::get('/changeEmail', 'ChangeEmailController@index')->name('changeEmail.index');
Route::get('/changeEmail/sent', 'ChangeEmailController@sent')->name('changeEmail.sent');
Route::get('/changeEmail/failed', 'ChangeEmailController@failed')->name('changeEmail.failed');
Route::get('/changeEmail/complete', 'ChangeEmailController@complete')->name('changeEmail.complete');
Route::get('/reset/{token}', 'ChangeEmailController@reset');
Route::post('/email', 'ChangeEmailController@sendChangeEmailLink');

//パスワード変更
Route::get('/changepassword', 'changePasswordController@index');
Route::post('/changepassword', 'changePasswordController@changePassword')->name('changepassword');
Route::get('/changepassword/complete', 'changePasswordController@complete')->name('changePassword.complete');
