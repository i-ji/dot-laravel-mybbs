<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(PostController::class)->group(function () {
    Route::get('/', 'index')
        ->name('posts.index');
    Route::get('/posts/{post}', 'show')
        ->name('posts.show')
        ->where('post', '[0-9]+');
    Route::get('/posts/create', 'create')
        ->name('posts.create');
    Route::post('/posts/store', 'store')
        ->name('posts.store');
    Route::get('/posts/{post}/edit', 'edit')
        ->name('posts.edit')
        ->where('post', '[0-9]+');
    Route::patch('/posts/{post}/update', 'update')
        ->name('posts.update')
        ->where('post', '[0-9]+');
    Route::delete('/posts/{post}/destroy', 'destroy')
        ->name('posts.destroy')
        ->where('post', '[0-9]+');
});

Route::controller(CommentController::class)->group(function () {
    Route::post('/comments/{post}/store', 'store')
        ->name('comments.store')
        ->where('post', '[0-9]+');
    Route::delete('/comments/{comment}/destroy', 'destroy')
        ->name('comments.destroy')
        ->where('comment', '[0-9]+');
});
