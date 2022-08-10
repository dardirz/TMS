<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
//auth
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom')->middleware('guest');
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom')->middleware(['isAdmin']);
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
Route::get('/', [AuthController::class, 'home'])->name('home');
//user 
Route::get('/admin/users', [UserController::class, 'index'])->name('user-show')->middleware('isAdmin','auth');
Route::get('admin/edit/{id}', [UserController::class, 'edit'])->name('user-edit')->middleware('isAdmin','auth');
Route::put('/update/{id}', [UserController::class, 'update'])->name('user-update')->middleware('isAdmin','auth');
Route::delete('/admin/delete/{id}',[UserController::class,'destroy'])->name('user-delete')->middleware('isAdmin','auth');
// trip routes
Route::get('trip', [TripController::class, 'create'])->name('trip')->middleware('isAdmin','auth');
Route::post('custom-trip', [TripController::class, 'store'])->name('trip.custom')->middleware('isAdmin','auth');
Route::get('/trips', [TripController::class, 'index'])->name('trip-show')->middleware('isAdmin','auth');
Route::get('/trips/edit/{id}', [TripController::class, 'edit'])->name('trip-edit')->middleware('isAdmin','auth');
Route::put('/trips/update/{id}', [TripController::class, 'update'])->name('trip-update')->middleware('isAdmin','auth');
Route::delete('/trip/delete/{id}',[TripController::class,'destroy'])->name('trip-delete')->middleware('isAdmin','auth');
//activity routes
Route::get('activity', [ActivityController::class, 'create'])->name('activity')->middleware('isAdmin','auth');
Route::post('custom-activity', [ActivityController::class, 'store'])->name('activity.custom')->middleware('isAdmin','auth');
Route::get('activities', [ActivityController::class, 'index'])->name('activity-show')->middleware('isAdmin','auth');
Route::get('/activities/edit/{id}', [ActivityController::class, 'edit'])->name('activity-edit')->middleware('isAdmin','auth');
Route::put('/activities/update/{id}', [ActivityController::class, 'update'])->name('activity-update')->middleware('isAdmin','auth');
Route::delete('/activities/delete/{id}',[ActivityController::class,'destroy'])->name('activity-delete')->middleware('isAdmin','auth');
//point routes
Route::get('point', [PointController::class, 'create'])->name('point')->middleware('isAdmin','auth');
Route::post('custom-point', [PointController::class, 'store'])->name('point.custom')->middleware('isAdmin','auth');
Route::get('points', [PointController::class, 'index'])->name('point-show')->middleware('isAdmin','auth');
Route::get('/points/edit/{id}', [PointController::class, 'edit'])->name('point-edit')->middleware('isAdmin','auth');
Route::put('/points/update/{id}', [PointController::class, 'update'])->name('point-update')->middleware('isAdmin','auth');
Route::delete('/points/delete/{id}',[PointController::class,'destroy'])->name('point-delete')->middleware('isAdmin','auth');




