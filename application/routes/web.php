<?php

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
    //@check 表示確認のため表示機能実装作業中のみ無効化。
    // ->middleware(['auth']);
