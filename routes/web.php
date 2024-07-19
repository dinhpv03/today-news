<?php

use App\Http\Controllers\HomeController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Auth::routes();


Route::get('/',                    [HomeController::class, 'index']);
Route::get('/home',                [HomeController::class, 'index'])->name('home');
Route::get('/category/{id}/posts', [HomeController::class, 'postsByCategory'])->name('category.posts');
Route::get('/post-detail/{id}',    [HomeController::class, 'postDetail'])->name('post-detail');
Route::post('/search',             [HomeController::class, 'search'])->name('search');


Route::get('profile', [HomeController::class, 'profile'])->name('profile');
Route::get('comment', [HomeController::class, 'profile'])->name('comment');






