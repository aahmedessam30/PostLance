<?php

use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\admin\AdminPostController;
use App\Http\Controllers\admin\AdminCommentController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminPasswordController;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\DashboardController;
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

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('users/admin/add/{user}', [AdminController::class, 'add_admin'])->name('add_admin.admin');

Route::get('users/admin/remove/{user}', [AdminController::class, 'remove_admin'])->name('remove_admin.admin');

Route::get('users/admins', [AdminController::class, 'users'])->name('user.admins');

Route::get('posts/admins', [AdminController::class, 'posts'])->name('post.admins');

Route::get('comments/admins', [AdminController::class, 'comments'])->name('comment.admins');

Route::resource('profile', AdminProfileController::class, ['parameters' => [
    'profile' => 'user'
]])->except(['index', 'create', 'store', 'destroy']);

Route::get('change-password/{user}', [AdminPasswordController::class , 'index'])->name('show.formPassword');

Route::put('change-password/{user}', [AdminPasswordController::class, 'changePassword'])->name('change.password');

Route::resource('users', AdminUserController::class)->names("user")->except(['show', 'edit', 'update']);

Route::resource('posts', AdminPostController::class)->names("post")->except(['edit', 'update']);

Route::resource('comments', AdminCommentController::class)->names("comment")->except(['show', 'edit', 'update']);
