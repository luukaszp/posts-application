<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

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

Route::prefix('posts')->group( function () {
    Route::get('/create', [PostController::class, 'create']);
    Route::post('/store', [PostController::class, 'store']);
    Route::get('/{id}', [PostController::class, 'showPost']);
    Route::put('/{id}', [PostController::class, 'edit']);
});

Route::prefix('categories')->group( function () {
    Route::get('/create', [CategoryController::class, 'create']);
    Route::post('/store', [CategoryController::class, 'store']);
});
