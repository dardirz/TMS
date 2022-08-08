<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\TripController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/admin/users', [AuthController::class, 'showUsers'])->name('user-show');
Route::get('admin/edit/{id}', [AuthController::class, 'edit'])->name('user-edit');
Route::put('/update/{id}', [AuthController::class, 'update'])->name('user-update');
Route::delete('/admin/delete/{id}',[AuthController::class,'destroy'])->name('user-delete');
// trip routes
Route::get('trip', [TripController::class, 'create'])->name('trip');
Route::post('custom-trip', [TripController::class, 'store'])->name('trip.custom');
Route::get('/trips', [TripController::class, 'index'])->name('trip-show');
Route::get('/trips/edit/{id}', [TripController::class, 'edit'])->name('trip-edit');
Route::put('/trips/update/{id}', [TripController::class, 'update'])->name('trip-update');
Route::delete('/trip/delete/{id}',[TripController::class,'destroy'])->name('trip-delete');
//activity routes
Route::get('activity', [ActivityController::class, 'create'])->name('activity');
Route::post('custom-activity', [ActivityController::class, 'store'])->name('activity.custom');
Route::get('activities', [ActivityController::class, 'index'])->name('activity-show');
Route::get('/activities/edit/{id}', [ActivityController::class, 'edit'])->name('activity-edit');
Route::put('/activities/update/{id}', [ActivityController::class, 'update'])->name('activity-update');
Route::delete('/activities/delete/{id}',[ActivityController::class,'destroy'])->name('activity-delete');
//point routes
Route::get('point', [PointController::class, 'create'])->name('point');
Route::post('custom-point', [PointController::class, 'store'])->name('point.custom');
Route::get('points', [PointController::class, 'index'])->name('point-show');
Route::get('/points/edit/{id}', [PointController::class, 'edit'])->name('point-edit');
Route::put('/points/update/{id}', [PointController::class, 'update'])->name('point-update');
Route::delete('/points/delete/{id}',[PointController::class,'destroy'])->name('point-delete');




