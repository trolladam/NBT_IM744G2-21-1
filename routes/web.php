<?php

use App\Http\Controllers;
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

Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/{post}', [Controllers\PostController::class, 'show'])->name('post.show');

Route::get('/profile/{user}', [Controllers\ProfileController::class, 'show'])->name('profile.show');

// Auth routes

Route::middleware(['guest'])->group(function () {
    // guest only routes
    Route::get('/sign-up', [Controllers\Auth\RegisterController::class, 'create'])->name('auth.register');
    Route::post('/sign-up', [Controllers\Auth\RegisterController::class, 'store']);

    Route::get('/sign-in', [Controllers\Auth\LoginController::class, 'create'])->name('auth.login');
    Route::post('/sign-in', [Controllers\Auth\LoginController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    // auth only routes
    Route::post('/sing-out', [Controllers\Auth\LoginController::class, 'destroy'])->name('auth.logout');

    Route::get('/publish', [Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/publish', [Controllers\PostController::class, 'store']);

    Route::get('/post/{post}/edit', [Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/{post}/edit', [Controllers\PostController::class, 'update']);

    Route::post('/post/{post}/upload-image', [Controllers\PostController::class, 'uploadImage'])->name('post.upload-image');
    Route::post('/post/{post}/delete-image', [Controllers\PostController::class, 'deleteImage'])->name('post.delete-image');
});
