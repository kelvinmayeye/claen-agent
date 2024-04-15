<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('auth.login');
})->name('login');
Route::get('register',[UserController::class,'getRegisterPage'])->name('user.register');
Route::get('user/logout',[AuthController::class,'logout'])->name('logout');

Route::get('home',[AuthController::class,'home'])->name('home');
Route::post('user/login',[AuthController::class,'login'])->name('user.login');
Route::post('register',[UserController::class,'register'])->name('user.register.store');
