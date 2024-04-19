<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ServiceController;
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

Route::get('/', function () {return view('auth.login');})->name('login');
Route::get('register',[UserController::class,'getRegisterPage'])->name('user.register');
Route::get('user/logout',[AuthController::class,'logout'])->name('logout');
Route::post('user/login',[AuthController::class,'login'])->name('user.login');
Route::post('register',[UserController::class,'register'])->name('user.register.store');

// user cant access this route without login
Route::middleware('auth')->group(function(){
Route::get('home',[AuthController::class,'home'])->name('home');
Route::get('services',[ServiceController::class,'index'])->name('services');
Route::post('services/store',[ServiceController::class,'store'])->name('services.store');

//customer s
Route::get('services/customer',[ServiceController::class,'serviceOffered'])->name('service.offered');

//agent
Route::get('services/agent',[AgentController::class,'getAgentServices'])->name('agent.get.services');
Route::get('services/agent/add',[AgentController::class,'storeAgentServices'])->name('agent.add.services');
});
