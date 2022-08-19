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


Auth::routes();
Route::get('register-step2', [\App\Http\Controllers\Auth\RegisterStep2Controller::class, 'showForm']);
Route::post('register-step2', [\App\Http\Controllers\Auth\RegisterStep2Controller::class, 'postForm'])
    ->name('register.step2');

Route::middleware('auth')->prefix('dashboard')->group(function(){
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::resource('/posts', App\Http\Controllers\PostController::class);
    Route::post('/posts/change/{id}/{status}', [App\Http\Controllers\PostController::class, 'changeStatus'])->name('posts.status');
    Route::resource('/users', App\Http\Controllers\UserController::class);
    Route::resource('/contacts', App\Http\Controllers\ContactController::class);
    Route::resource('/messages', App\Http\Controllers\MessageController::class);

});

Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::resource('/show_posts', App\Http\Controllers\ProdPostController::class);

Route::post('sendMessage', [\App\Http\Controllers\ApiController::class, 'sendMessage']);


