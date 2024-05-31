<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\TopController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CurriculumController;
use App\Http\Controllers\Admin\ArticleController;

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

Auth::routes();

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('login', [LoginController::class, 'index'])->name('auth.login');
        Route::post('login', [LoginController::class, 'login']);
        Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');
        Route::get('register', [RegisterController::class, 'index'])->name('auth.register');
        Route::post('register', [RegisterController::class, 'register']);
    });

Route::get('top', [TopController::class, 'showTop'])->name('top');
Route::get('curriculum_list', [CurriculumController::class, 'showCurriculumList'])->name('curriculum_list');
Route::get('article_list', [ArticleController::class, 'showArticleList'])->name('article_list');
Route::get('banner_edit', [BannerController::class, 'showBannerEdit'])->name('show.banner.edit');
Route::post('banners', [BannerController::class, 'store'])->name('banners.store');
Route::delete('banners/{banner}', [BannerController::class, 'destroy'])->name('banners.destroy');

});