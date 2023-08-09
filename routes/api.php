<?php

use Spatie\FlareClient\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categoriesajax', [CategoryController::class, 'index'])->name('categoriesajax.index');
Route::post('/categoriesajax/store', [CategoryController::class, 'store'])->name('categoriesajax.store');
Route::get('categoriesajax/{id}/edit', [CategoryController::class, 'edit'])->name('categoriesajax.edit');
Route::put('/categoriesajax/update/{id}', [CategoryController::class, 'update'])->name('categoriesajax.update');
Route::delete('/categoriesajax/delete/{id}', [CategoryController::class, 'destroy'])->name('categoriesajax.destroy');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
