<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', function () {
    return view('index');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/form', [App\Http\Controllers\FormController::class, 'index']);
Route::post('/form', [App\Http\Controllers\FormController::class, 'store']);


Route::get('/table', [App\Http\Controllers\FormController::class, 'table']);