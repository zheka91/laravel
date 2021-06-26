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

Route::get('/category/{catid}', [NewsController::class, 'index'])
    ->name('news.catid');

Route::get('/news/{id}', [NewsController::class, 'show'])
    ->name('news.id')
    ->where('id', '\d+');