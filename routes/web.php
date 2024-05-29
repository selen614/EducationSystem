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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/login', [App\Http\Controllers\admin\LoginController::class, 'index']);
Route::post('/admin/login', [App\Http\Controllers\admin\LoginController::class, 'login']);
Route::post('admin/logout', [App\Http\Controllers\admin\LoginController::class,'logout']);
Route::get('/admin/register', [App\Http\Controllers\admin\RegisterController::class, 'index']);
Route::post('/admin/register', [App\Http\Controllers\admin\RegisterController::class, 'register']);
Route::view('/admin/home', 'admin/home')->middleware('auth:admin');