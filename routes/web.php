<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('user')->group(function () {
    Route::get('/',                         [UserController::class, 'index'])->name('user.index');
    Route::get('/show-user/{user}',         [UserController::class,'show'])->name('user.show');
    Route::get('/create-user',              [UserController::class, 'create'])->name('user.create');
    Route::post('/store-user',              [UserController::class, 'store'])->name('user-store');
    Route::get('/edit-user/{user}',         [UserController::class,'edit'])->name('user.edit');
    Route::put('/update-user/{user}',       [UserController::class, 'update'])->name('user-update');
    Route::delete('/destroy-user/{user}',   [UserController::class,'destroy'])->name('user.destroy');
});

Route::prefix('post')->group(function (){
    Route::get('/', [PostController::class, 'index'])->name('post.index');
});

Route::prefix('profile')->group( function () {
    Route::get('/profile/show-profile/{user}', [ProfileController::class,'show'])->name('profile.show');
});


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