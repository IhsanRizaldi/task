<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
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

Route::prefix('register')->group(function () {
    Route::get('/', [AuthController::class,'regindex'])->name('register.index');
    Route::post('/store', [AuthController::class,'store'])->name('register.store');
});


Route::prefix('login')->group(function () {
    Route::get('/', [AuthController::class,'logindex'])->name('login');
    Route::post('/login', [AuthController::class,'login'])->name('login.store');
});

Route::prefix('logout')->group(function () {
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('/task')->group(function () {
        Route::get('/', [TaskController::class,'index'])->name('task.index');
        Route::get('/create', [TaskController::class,'create'])->name('task.create');
        Route::post('/store', [TaskController::class,'store'])->name('task.store');
        Route::get('/edit/{id}', [TaskController::class,'edit'])->name('task.edit');
        Route::post('/update/{id}', [TaskController::class,'update'])->name('task.update');
        Route::get('/destroy/{id}', [TaskController::class,'destroy'])->name('task.destroy');
    })->middleware('auth');
});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('/')->group(function () {
        Route::get('/', [HomeController::class,'index'])->name('home.index');
    })->middleware('auth');
});
