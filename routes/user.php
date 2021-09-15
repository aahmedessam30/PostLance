<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\PostController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\CommentController;
use App\Http\Controllers\user\PasswordController;

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

Route::resource('profile', ProfileController::class, ['parameters' => [
    'profile' => 'user'
]])->except(['index', 'create', 'store', 'destroy']);

Route::get('change-password/{user}', [PasswordController::class, 'index'])->name('show.formPassword');

Route::put('change-password/{user}', [PasswordController::class, 'changePassword'])->name('change.password');

Route::resource('posts', PostController::class)->names("post");

Route::resource('comments', CommentController::class)->names("comment")->except(['show', 'create']);
