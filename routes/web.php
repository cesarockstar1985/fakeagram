<?php

use App\Mail\NewUserWelcome;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/email', function () {
    return new NewUserWelcome();
});

Route::post('/follow/{user}', [App\Http\Controllers\FollowsController::class, 'store']);
Route::post('/like/{post}', [App\Http\Controllers\LikeController::class, 'store']);
Route::get('/like/{post}', [App\Http\Controllers\LikeController::class, 'show']);

Route::get('/followers/{user}', [App\Http\Controllers\FollowsController::class, 'index']);
Route::get('/following/{user}', [App\Http\Controllers\FollowsController::class, 'show']);

Route::post('/comment', [App\Http\Controllers\CommentController::class, 'store']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

Route::get('/', [App\Http\Controllers\PostsController::class, 'index']);
Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create']);
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show']);
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store']);