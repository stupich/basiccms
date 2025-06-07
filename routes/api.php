<?php

use Illuminate\Support\Facades\Route;

// Posts
Route::get('api/posts/{id}',);
Route::get('api/posts/all',);

// User profile
Route::get('api/user/{name}',);
Route::get('api/user/{name}/settings',)->middleware('auth:sanctum');
Route::get('api/user/{name}/posts',);

// User posts
Route::middleware('auth:sanctum')->group(function () {
    Route::get('api/user/{name}/posts/edit/{id}',);
    Route::post('api/user/{name}/posts/create',);
});
