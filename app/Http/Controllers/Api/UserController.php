<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\Registro;
use App\Repositories\UsersTypeRepository;
use App\Services\CreateUser;
use App\Services\LoginUser;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    use ResponseHelper;
    public function login(LoginRequest $request)
    {
        $loginService = app(LoginUser::class);

        $dataLogin = $loginService($request);
        if ($dataLogin) {
            return $this->makeSuccessResponse($dataLogin, 200);
        }

        return $this->makeErrorResponse("Failed to login", 401);
    }

    public function registerUser(RegisterRequest $request)
    {

        $createService = app(CreateUser::class);
        $loginService = app(LoginUser::class);
        $repositoryType = new UsersTypeRepository();
        $request['type_id'] = $repositoryType->findByName('BaseUser')->id;

        $createService($request);
        $dataLogin = $loginService($request);
        if ($dataLogin) {
            Mail::to($dataLogin["user"]->email)->send(new Registro($dataLogin["user"]));
            return $this->makeSuccessResponse($dataLogin, 200);
        }
        return $this->makeErrorResponse("Failed to register", 401);
    }
}
