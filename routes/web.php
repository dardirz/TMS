<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('/', [CustomAuthController::class, 'home']);

Route::get('/admin/users', [CustomAuthController::class, 'showUsers'])->name('user-show');

Route::get('admin/edit/{id}', [CustomAuthController::class, 'edit'])->name('user-edit');
Route::put('/update/{id}', [CustomAuthController::class, 'update'])->name('user-update');
Route::delete('/admin/delete/{id}',[CustomAuthController::class,'destroy'])->name('user-delete');
