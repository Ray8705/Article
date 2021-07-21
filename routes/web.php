<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('articles/{id}', [ArticleController::class, 'articleList']);

Route::get('article/{id}', [ArticleController::class, 'articleDetail']);

Route::get('comments/{id}', [CommentController::class, 'commentList']);

Route::get('comment/{id}', [CommentController::class, 'commentOne']);
