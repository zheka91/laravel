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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}', function ($name) {
    return "Hello, {$name}!";
});

Route::get('/info', function () {
    return "Информация о проекте.";
});

Route::get('/news/{id}', function ($id) {
    return "Новость id = {$id}.";
});
