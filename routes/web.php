<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


route::get('/', [UserController::class, 'index'])->name('user.index');
route::get('/show-user{user}', [UserController::class,'show'])->name('user.show');
route::get('/create-user', [UserController::class, 'create'])->name('user.create');
route::post('/store-user', [UserController::class, 'store'])->name('user-store');
route::get('/edit-user{user}', [UserController::class,'edit'])->name('user.edit');
route::put('/update-user{user}', [UserController::class, 'update'])->name('user-update');
route::delete('/destroy-user{user}', [UserController::class,'destroy'])->name('user.destroy');

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