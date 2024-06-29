<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\ArticleController as UserArticleController;
use App\Http\Controllers\User\ProgressController;
use App\Http\Controllers\User\ProfileController;

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;


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

Route::prefix('user')->namespace('User')->name('user.')->group(function () {
    Route::get('/article/{id}', 'ArticleController@showArticle')->name('show.article');
    Route::get('/progress', 'ProgressController@showProgress')->name('show.progress');
    Route::get('/profile', 'ProfileController@showProfileForm')->name('show.profile');
    Route::post('/profile', 'ProfileController@updateProfile')->name('update.profile');
    Route::get('/password', 'ProfileController@showPasswordForm')->name('show.password.edit');
    Route::post('/password', 'ProfileController@updatePassword')->name('update.password');
});

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/article_list', 'ArticleController@showArticleList')->name('show.article.list');
    Route::get('/article_create', 'ArticleController@showArticleCreate')->name('show.article.create');
    Route::get('/article_edit/{id}', 'ArticleController@showArticleEdit')->name('show.article.edit');
    Route::post('/articles', 'ArticleController@showArticleStore')->name('show.article.store');
    Route::put('/articles/{id}', 'ArticleController@showArticleUpdate')->name('show.article.update');
    Route::delete('/articles/{id}', 'ArticleController@showArticleDestroy')->name('show.article.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
