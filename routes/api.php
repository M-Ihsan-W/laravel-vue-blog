<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});

Route::get('/posts', [PostController::class, 'getData']);
Route::get('/posts/category', [PostController::class, 'getPostCategory']);
Route::get('/posts/popular', [PostController::class, 'getPostPopular']);
Route::get('/posts/category/{category}', [PostController::class, 'getSpecificCategory']);
Route::get('/posts/{slug}', [PostController::class, 'getSpecificData']);
Route::post('/create/post', [PostController::class, 'store']);
Route::get('/update/post/{id}', [PostController::class, 'show']);
Route::post('/update/post/{id}', [PostController::class, 'update']);
Route::delete('/delete/post/{id}', [PostController::class, 'destroy']);

// Authentication
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
// Route::group(['middleware' => ['web']], function () {
    // Route::get('/token', function (Request $request) {
    //     $token = $request->session()->token();
    
    //     $token = csrf_token();
    //     return $token;
    // });
// });