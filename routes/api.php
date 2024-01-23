<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\RoomTypeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('ping', function () {
        return response()->json('pong', 200);
    });

    Route::get('users/index', [UserController::class, 'index']);

    // RUTAS PRIVADAS SERVICIOS
    Route::post('service/create', [ServiceController::class, 'store']);
    Route::put('service/update/{id}', [ServiceController::class, 'update']);
    Route::get('service/delete/{id}', [ServiceController::class, 'destroy']);

    // RUTAS PRIVADAS OFERTAS
    Route::post('offer/create', [OfferController::class, 'store']);
    Route::put('offer/update/{id}', [OfferController::class, 'update']);
    Route::get('offer/delete/{id}', [OfferController::class, 'destroy']);
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'registerUser']);

// RUTAS PÚBLICAS SERVICIOS
Route::get('service', [ServiceController::class, 'index']);
Route::get('service/{id}', [ServiceController::class, 'show']);

// RUTAS PÚBLICAS OFERTAS
Route::get('offer', [OfferController::class, 'index']);
Route::get('offer/{id}', [OfferController::class, 'show']);

//RUTAS PÚBLICAS TIPOS DE HABITACIÓN

Route::get('room-types', [RoomTypeController::class, 'indexTypes']);
Route::get('search', [RoomTypeController::class, 'indexSearch']);
