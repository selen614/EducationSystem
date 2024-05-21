<?php

use Illuminate\Support\Facades\Route;

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

//Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace('User')->name('user.')->group(function () {
  
  // AuthRouteMethods.phpのルートを手動で記述
  //ログインページ
  Route::get('/login', [App\Http\Controllers\User\Auth\LoginController::class, 'showLoginForm'])->name('show.login');
  Route::post('/login', [App\Http\Controllers\User\Auth\LoginController::class, 'login'])->name('login');
  Route::post('/logout', [App\Http\Controllers\User\Auth\LoginController::class, 'logout'])->name('logout');
  
  //ユーザー新規登録画面
  Route::get('/register',[App\Http\Controllers\User\Auth\RegisterController::class, 'showRegisterForm'])->name('show.register');
  Route::post('/register', [App\Http\Controllers\User\Auth\RegisterController::class, 'register']);
  
  Route::get('password/reset', [App\Http\Controllers\User\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
  Route::post('password/email', [App\Http\Controllers\User\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
  Route::get('password/reset/{token}', [App\Http\Controllers\User\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
  Route::post('password/reset', [App\Http\Controllers\User\Auth\ResetPasswordController::class, 'reset'])->name('password.update');
  
//ログインページ
Route::get('/login', [App\Http\Controllers\User\Auth\LoginController::class, 'showLoginForm'])->name('show.login');

//トップページ
Route::get('/top', [App\Http\Controllers\User\Auth\TopController::class, 'showTop'])->name('show.top');

//配信画面
Route::get('/delivery', [App\Http\Controllers\User\Auth\DeliveryController::class, 'showDelivery'])->name('show.delivery');

});