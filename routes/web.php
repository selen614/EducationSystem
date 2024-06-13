<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\TopController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\User\CurriculumController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;


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
        Route::post('login', [LoginController::class, 'login'])->name('auth.login.post');
        Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');
        Route::get('register', [RegisterController::class, 'index'])->name('auth.register'); 
        Route::post('register', [RegisterController::class, 'register'])->name('auth.register.store'); 
    });

Route::get('top', [TopController::class, 'showTop'])->middleware('auth:admin')->name('admin.top');
Route::get('banner_edit', [BannerController::class, 'showBannerEdit'])->name('show.banner.edit');
Route::get('article_list', [BannerController::class, 'showArticleList'])->name('show.article.list');//仮置き
Route::post('banner_edit', [BannerController::class, 'bannerStore'])->name('banner.store');
Route::post('/banner_update/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');

});

Route::prefix('user')->namespace('User')->name('user.')->group(function () {
    Route::middleware('auth')->group(function() {
Route::get('curriculum_list', [CurriculumController::class, 'showCurriculumList'])->name('show.curriculum.list');
Route::get('class_schedule', [CurriculumController::class, 'getClasses'])->name('getclasses');
Route::get('top', [TopController::class, 'showTop'])->name('show.top');
});
});



Route::get('/home', [HomeController::class, 'index'])->name('home');