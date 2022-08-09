<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\API\ActivityApiController;
use App\Http\Controllers\API\PointApiController;
use App\Http\Controllers\API\TripApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

////////////////////   activity  \\\\\\\\\\\\\\\\

Route::get('/activity', [ActivityApiController::class,'index'] );
Route::get('/activity/{id}', [ActivityApiController::class,'show'] );
Route::post('/activity', [ActivityApiController::class,'store'] );
Route::put('/activity/{id}', [ActivityApiController::class,'update'] );
Route::delete('/activity/{id}', [ActivityApiController::class,'destroy'] );

/////////////////////////////////////////////////

/////////////////////    point     \\\\\\\\\\\\\\\\
Route::get('/point', [PointApiController::class,'index'] );
Route::get('/point/{id}', [PointApiController::class,'show'] );
Route::post('/point', [PointApiController::class,'store'] );
Route::put('/point/{id}', [PointApiController::class,'update'] );
Route::delete('/point/{id}', [PointApiController::class,'destroy'] );
////////////////////////////////////////////////////

/////////////////////    trip     \\\\\\\\\\\\\\\\
Route::get('/trip', [TripApiController::class,'index'] );
Route::get('/trip/{id}', [TripApiController::class,'show'] );
Route::post('/trip', [TripApiController::class,'store'] );
Route::put('/trip/{id}', [TripApiController::class,'update'] );
Route::delete('/trip/{id}', [TripApiController::class,'destroy'] );



