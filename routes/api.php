<?php

use App\Http\Controllers\Api\UserController;
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
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'registerUser']);
