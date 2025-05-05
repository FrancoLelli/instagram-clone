<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', [PostController::class, 'index'])->middleware('auth')->name('home');

Auth::routes();

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::path('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.index');
Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comment.store');
Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');

Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('likes.destroy');