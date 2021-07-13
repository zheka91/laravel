<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\NewsController;

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

Route::get('/category', [CategoryNewsController::class, 'index'])
    ->name('category');

Route::get('/categorycreate', [CategoryNewsController::class, 'create'])
    ->name('category.create');

Route::post('/categorycreate', [CategoryNewsController::class, 'store'])
    ->name('category.store');

Route::get('/categoryedit/{catid}', [CategoryNewsController::class, 'edit'])
    ->name('category.edit');

Route::put('/categoryupdate/{category}', [CategoryNewsController::class, 'update'])
    ->name('category.update');

Route::get('/category/{catid}', [NewsController::class, 'index'])
    ->name('news.catid');

Route::get('/news/{id}', [NewsController::class, 'edit'])
    ->name('news.id')
    ->where('id', '\d+');

Route::get('/newscreate/{catid}', [NewsController::class, 'create'])
    ->name('news.create');

Route::post('/newscreate/{catid}', [NewsController::class, 'store'])
    ->name('news.store');

Route::put('/newsupdate/{news}', [NewsController::class, 'update'])
    ->name('news.update');