<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
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
// Laravel Route
// Route::get('/login', [AuthController::class, 'login']);
// Route::post('/login', [AuthController::class, 'attemptLogin'])->name('login.user');
// Route::get('/register', [AuthController::class, 'register']);
// Route::post('/register', [AuthController::class, 'store'])->name('register.user');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
// // Post Controller
// Route::get('/admin/posts', [PostController::class, 'index']);
// Route::get('/admin/posts/create', [PostController::class, 'create']);
// Route::get('/admin/posts/update/{id}', [PostController::class, 'show']);
// Route::get('/admin/posts/delete/{id}', [PostController::class, 'destroy']);
// Route::post('/create-posts', [PostController::class, 'store'])->name('create.posts');
// Route::post('/update-posts', [PostController::class, 'update'])->name('update.posts');

// Vue JS Route
Route::get('/', function () {
    return view('\users\index');
});


Route::get('/{vue_capture?}', function() {
    return view('\users\index');
})->where('vue_capture', '[\/\w\.-]*');