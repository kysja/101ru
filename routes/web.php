<?php

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

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;


Route::get('/', [PageController::class, 'index'])->name("page.index");
Route::get('/about', [PageController::class, 'about'])->name("page.about");
Route::get('/posts', [PostController::class, 'index'])->name("post.index");
Route::get('/posts/{slug}', [PostController::class, 'show'])->name("post.show");





