<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PageController::class, 'index'])->name('welcome');
Route::get('/ebooks/{category:slug}',[PageController::class,'postByCategory'])->name('welcome.category');
Route::get("/admin-choice",[PageController::class,'postByAdminChoice'])->name('welcome.postByAdminChoice');
Route::get("/detail/{category:slug}",[PageController::class,'postDetail'])->name('welcome.detail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth','isAdmin'])->group(function(){
    Route::resource('/category',CategoryController::class);
    Route::resource('/user',UserController::class);
    Route::get("/book/download/{id}",[BookController::class,'download'])->name('book.download');
    Route::get("/book/cateogry/{id}",[BookController::class,'postByCategory'])->name('book.postByCategory');
    Route::get("/book/admin-choice",[BookController::class,'postByAdminChoice'])->name('book.postByAdminChoice');
    Route::put("/book/update_admin_choice/{id}",[BookController::class,'makeAdminChoice'])->name('book.admin_choice');
    Route::resource('/book', BookController::class);
});
