<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\BaseException;
use App\Exceptions\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Resources\ResourceCollection;
use App\Http\Resources\RoomTypeResource;
use App\Repositories\RoomTypeRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    use ResponseHelper;

    public function indexSearch(SearchRequest $request)
    {
        $repository = new RoomTypeRepository();
        $filters = [];
        try {

            $filters["check_in"] = Carbon::createFromFormat('d-m-Y', $request["check_in"])->endOfDay();
            $filters["check_out"] = Carbon::createFromFormat('d-m-Y', $request["check_out"])->endOfDay();
        } catch (\Throwable $th) {
            throw new BaseException('There is a problem with the date format', 400);
        }
        $filters["occupants"] = $request["occupants"];
        $filters["room_type_name"] = $request["room_type_name"];

        return $repository->getAllPaginatedForSearch($request->get('page', 1), $request->get('perPage', 10), $filters);
    }

    public function indexTypes()
    {
        $repository = new RoomTypeRepository();
        $allTypes =  $repository->getAllTypes();

        return ResourceCollection::make($allTypes, RoomTypeResource::class);
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
