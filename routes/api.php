<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\OfferController;
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

        //Mail::to(Auth::user()->email)->send(new Registro(Auth::user()));
        return response()->json('pong', 200);
    });

    // RUTAS SERVICIOS
    Route::get('service', [ServiceController::class, 'index']);
    Route::get('service/{id}', [ServiceController::class, 'show']);
    Route::post('service/create', [ServiceController::class, 'store']);
    Route::put('service/update/{id}', [ServiceController::class, 'update']);
    Route::get('service/delete/{id}', [ServiceController::class, 'destroy']);

    // RUTAS OFERTAS
    Route::get('offer', [OfferController::class, 'index']);
    Route::get('offer/{id}', [OfferController::class, 'show']);
    Route::post('offer/create', [OfferController::class, 'store']);
    Route::put('offer/update/{id}', [OfferController::class, 'update']);
    Route::get('offer/delete/{id}', [OfferController::class, 'destroy']);
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'registerUser']);
