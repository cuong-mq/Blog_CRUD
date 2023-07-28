<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\PostCondition;

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

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

Route::get('/post', [PostController::class, 'show'])->name('post.show');
Route::get('/post/list', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create/{categoryId}', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store/{categoryId}', [PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::put('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
