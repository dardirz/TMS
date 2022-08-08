<?php

use App\Http\Controllers\ActivityApiController;
use App\Http\Controllers\AuthApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PointApiController;
use App\Http\Controllers\TripApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthApiController::class, 'login']);
    Route::post('/register', [AuthApiController::class, 'register']);
    Route::post('/logout', [AuthApiController::class, 'logout']);
    Route::post('/refresh', [AuthApiController::class, 'refresh']);
    Route::get('/user-profile', [AuthApiController::class, 'userProfile']);
    //trips
    Route::get('/trips', [TripApiController::class, 'index']);
    Route::post('/create/trip', [TripApiController::class, 'create']);
    Route::put('/update/trip/{id}', [TripApiController::class, 'update']);
    Route::delete('/delete/trip/{id}', [TripApiController::class, 'delete']);


    //activities
    Route::get('/activities', [ActivityApiController::class, 'index']);
    Route::post('/create/activity', [ActivityApiController::class, 'create']);
    Route::put('/update/activity/{id}', [ActivityApiController::class, 'update']);
    Route::delete('/delete/activity/{id}', [ActivityApiController::class, 'delete']);

    //points
    Route::get('/points', [PointApiController::class, 'index']);
    Route::post('/create/point', [PointApiController::class, 'create']);
    Route::put('/update/point/{id}', [PointApiController::class, 'update']);
    Route::delete('/delete/point/{id}', [PointApiController::class, 'delete']);


});
