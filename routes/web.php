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
    return view('index');
})->name('home');

//Route::resource('posts', \App\Http\Controllers\PostController::class);

Route::resource('posts', \App\Http\Controllers\PostController::class)->only([
    'index',
    'show',
    'create', // Not should be there
]);

Route::middleware("guest:web")->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/login_process', [\App\Http\Controllers\AuthController::class, 'loginProcess'])->name('login_process');

    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
    Route::post('/register_process', [\App\Http\Controllers\AuthController::class, 'registerProcess'])->name('register_process');
});

Route::middleware("auth:web")->group(function () {
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    Route::resource('posts', \App\Http\Controllers\PostController::class)->only([
        //'create', -> tried to hide route from guests, but get 404 Not Found
        'store',
        'update',
        'destroy',
        'edit',
    ]);
});
