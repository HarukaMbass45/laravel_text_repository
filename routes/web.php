<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('/home', function () {
    return view('home');
});

// アカウント登録
Route::get('/register', [App\Http\Controllers\RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store'])
    ->middleware('guest');

// ユーザ認証
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate'])
    ->middleware('guest');

// ログアウト
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// App\Http\Controllers\TaskControllerクラスのgetTasksメソッドを実行
Route::get('/tasks', [App\Http\Controllers\TasksController::class, 'getTasks']);

Route::get('/hello', function (Request $request) {
    return view('hello');
});