<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\ResourceCollection;
use App\Http\Resources\UserResource;
use App\Mail\Registro;
use App\Models\RoomType;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Repositories\UsersTypeRepository;
use App\Services\CreateUser;
use App\Services\LoginUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RoomTypeController extends Controller
{
    use ResponseHelper;

    public function index(Request $request)
    {
    }
    public function store(LoginRequest $request)
    {
    }

    public function destroy(RegisterRequest $request)
    {
    }

    public function show(RegisterRequest $request)
    {
    }
}
