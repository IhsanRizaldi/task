<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('/')->group(function () {
        Route::get('/', [HomeController::class,'index'])->name('home.index');
    })->middleware('auth');

});
