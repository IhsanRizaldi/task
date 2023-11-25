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
    Route::get('/', [AuthController::class,'register'])->name('register.index');
    Route::post('/store', [AuthController::class,'register_store'])->name('register.store');
})->middleware('guest');


Route::prefix('login')->group(function () {
    Route::get('/', [AuthController::class,'login'])->name('login');
    Route::post('/login', [AuthController::class,'login_store'])->name('login.store');
})->middleware('guest');

Route::prefix('logout')->group(function () {
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
})->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('/')->group(function () {
        Route::get('/', [HomeController::class,'index'])->name('home.index');
    })->middleware('auth');
});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('/task')->group(function () {
        Route::post('/store', [TaskController::class,'store'])->name('task.store');
        Route::post('/update', [TaskController::class,'update'])->name('task.update');
        Route::get('/update_status/{id}', [TaskController::class,'update_status'])->name('task.update_status');
        Route::get('/destroy/{id}', [TaskController::class,'destroy'])->name('task.destroy');
    })->middleware('auth');
});


