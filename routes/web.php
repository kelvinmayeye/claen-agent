<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BookingController;
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

Route::get('/', function () {return view('welcome');});
Route::get('login', function () {return view('auth.login');})->name('login');
Route::get('register',[UserController::class,'getRegisterPage'])->name('user.register');
Route::get('user/logout',[AuthController::class,'logout'])->name('logout');
Route::post('user/login',[AuthController::class,'login'])->name('user.login');
Route::post('register',[UserController::class,'register'])->name('user.register.store');

// user cant access this route without login
Route::middleware('auth')->group(function(){
    //all users profile
Route::get('users/profile',[UserController::class,'getProfilePage'])->name('users.profile');
Route::post('users/update/profile',[UserController::class,'updateProfile'])->name('users.update.profile');
Route::post('users/change/password',[UserController::class,'changePassword'])->name('change.password');

Route::get('home',[AuthController::class,'home'])->name('home');
Route::get('services',[ServiceController::class,'index'])->name('services');
Route::post('services/store',[ServiceController::class,'store'])->name('services.store');

//customer s
Route::get('services/customer',[ServiceController::class,'serviceOffered'])->name('service.offered');
Route::get('bookings/customer',[BookingController::class,'customerBookings'])->name('customer.bookings');
Route::get('customer/view/bookings/{id}',[BookingController::class,'customerViewBooking'])->name('customer.view.booking');
Route::delete('customer/bookings/cancel{id}',[BookingController::class,'customerCancelBookings'])->name('customer.cancel.bookings');
Route::post('customer/add/booking',[BookingController::class,'addBooking'])->name('add.booking');
Route::post('customer/change/booking',[BookingController::class,'changeServiceBooking'])->name('customer.change.booking');
Route::post('customer/add/multiple/booking',[BookingController::class,'addMultipleBooking'])->name('add.multiple.booking');
Route::delete('customer/delete/service{id}',[BookingController::class,'customerDeleteBookingService'])->name('customer.delete.service');

//agent - services
Route::get('services/agent',[AgentController::class,'getAgentServices'])->name('agent.get.services');
Route::get('services/agent/add',[AgentController::class,'storeAgentServices'])->name('agent.add.services');
Route::get('services/agent/details/{id}',[AgentController::class,'agentServiceDetails'])->name('agent.service.details');
Route::get('services/agent/status/{id}',[AgentController::class,'changeStatus'])->name('agent.service.change.status');
Route::get('services/agent/delete/{id}',[AgentController::class,'deleteAgentService'])->name('agent.service.delete');
Route::get('services/agent/bookings',[AgentController::class,'agentServiceBookings'])->name('agent.service.bookings');
Route::post('services/agent/update',[AgentController::class,'saveAgentServiceUpdate'])->name('agent.service.update');
Route::get('agent/view/customer/booking/{id}',[AgentController::class,'viewCustomerBooking'])->name('agent.view.customer.booking');
Route::post('ajax/get/agent/service',[AgentController::class,'ajax_get_agent_service'])->name('ajax.get.agent.service');
Route::post('ajax/get/agent/service/change',[AgentController::class,'ajax_get_agent_service_change'])->name('ajax.get.agent.service.change');

//agent booking actions
Route::get('ajax/confirm/booking',[AgentController::class,'ajax_confirm_booking'])->name('ajax.confirm.booking');
Route::get('ajax/cancel/booking',[AgentController::class,'ajax_cancel_booking'])->name('ajax.cancel.booking');
Route::get('ajax/markas/attended',[AgentController::class,'mark_as_attended'])->name('ajax.markas.attended');



//admin and agents
Route::get('all/agents',[AdminController::class,'getAgents'])->name('all.agents');
Route::get('all/customers',[AdminController::class,'getCustomers'])->name('all.customers');
});
