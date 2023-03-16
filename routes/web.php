<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [PostController::class, 'show'])->name('posts');
Route::get('/search', [PostController::class, 'search'])->name('search');
Route::get('/single/{post:slug}', [PostController::class, 'single'])->name('single');
Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('archive-post');
Route::get('/tag/{tag:slug}', [TagController::class, 'show'])->name('tag-post');
Route::get('/user/{user:username}', [UserController::class, 'show'])->name('user-post');

// Register
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register/store', [UserController::class, 'store']);
