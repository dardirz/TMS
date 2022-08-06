<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\TripController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('/', [CustomAuthController::class, 'home'])->name('home');

Route::get('/admin/users', [CustomAuthController::class, 'showUsers'])->name('user-show');

Route::get('admin/edit/{id}', [CustomAuthController::class, 'edit'])->name('user-edit');
Route::put('/update/{id}', [CustomAuthController::class, 'update'])->name('user-update');
Route::delete('/admin/delete/{id}',[CustomAuthController::class,'destroy'])->name('user-delete');

// activity \\
Route::get('/admin/activity',[ActivityController::class,'index'])->name('activity.index');
Route::get('/admin/activity/edit/{id}',[ActivityController::class,'edit'])->name('activity.edit');
Route::put('/admin/activity/update/{id}',[ActivityController::class,'update'])->name('activity.update');
Route::get('/admin/activity/create',[ActivityController::class,'create'])->name('activity.create');
Route::post('/admin/activity/store',[ActivityController::class,'store'])->name('activity.store');
Route::delete('/admin/activity/delete/{id}',[ActivityController::class,'destroy'])->name('activity.delete');

//  point \\
Route::get('/admin/point',[PointController::class,'index'])->name('point.index');
Route::get('/admin/point/edit/{id}',[PointController::class,'edit'])->name('point.edit');
Route::put('/admin/point/update/{id}',[PointController::class,'update'])->name('point.update');
Route::get('/admin/point/create',[PointController::class,'create'])->name('point.create');
Route::post('/admin/point/store',[PointController::class,'store'])->name('point.store');
Route::delete('/admin/point/delete/{id}',[PointController::class,'destroy'])->name('point.delete');

//  trip  \\
Route::get('/admin/trip',[TripController::class,'index'])->name('trip.index');
Route::get('/admin/trip/edit/{id}',[TripController::class,'edit'])->name('trip.edit');
Route::put('/admin/trip/update/{id}',[TripController::class,'update'])->name('trip.update');
Route::get('/admin/trip/create',[TripController::class,'create'])->name('trip.create');
Route::post('/admin/trip/store',[TripController::class,'store'])->name('trip.store');
Route::delete('/admin/trip/delete/{id}',[TripController::class,'destroy'])->name('trip.delete');
