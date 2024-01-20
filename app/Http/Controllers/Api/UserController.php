<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\ResourceCollection;
use App\Http\Resources\UserResource;
use App\Mail\Registro;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Repositories\UsersTypeRepository;
use App\Services\CreateUser;
use App\Services\LoginUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    use ResponseHelper;

    public function index(Request $request)
    {
        $this->authorize("index", User::class);
        $repositoryUser = new UserRepository();
        $data = [];
        $data["user_type"] = $request["user_type"];
        $data["location"] = $request["location"];
        $data["address"] = $request["address"];
        $userList = $repositoryUser->getAllPaginated($request->get('page', 1), $request->get('perPage', 10), $data);

        return  ResourceCollection::make($userList, UserResource::class);
    }
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
