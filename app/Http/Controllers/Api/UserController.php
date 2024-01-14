<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\LoginUser;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {

        $loginService = app(LoginUser::class);

        $dataLogin = $loginService($request);
        if ($dataLogin) {
            return response()->json($dataLogin, 200);
        }


        return response()->json(["user" => "Failed to login"], 401);
    }
}
