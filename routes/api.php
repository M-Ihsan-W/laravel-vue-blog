<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', [PostController::class, 'getData']);
Route::get('/posts/category', [PostController::class, 'getPostCategory']);
Route::get('/posts/category/{category}', [PostController::class, 'getSpecificCategory']);
Route::get('/posts/{slug}', [PostController::class, 'getSpecificData']);
