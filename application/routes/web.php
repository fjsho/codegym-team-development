<?php

use App\Http\Controllers\AttachmentFileController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PostController::class, 'index'])
    ->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('users', UserController::class)->only([
    'show'
]);

//Post用
Route::resource('posts', PostController::class);
// @check 確認のため一時的にコメントアウト。作業完了時は解除すること。
// ->middleware(['auth']);

Route::resource('posts/{post}/attachment_files', AttachmentFileController::class);
// @check 確認のため一時的にコメントアウト。作業完了時は解除すること。
// ->middleware(['auth']);
