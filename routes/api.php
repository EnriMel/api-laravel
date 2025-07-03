<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// tutti, uno, inseire, put, patch, elimina
Route::get('/posts', [PostController::class, '']);
Route::get('/post/{id}');
Route::post('/posts');
Route::put('/post/{id}');
Route::patch('/post/{id}');
Route::delete('/post/{id}');
