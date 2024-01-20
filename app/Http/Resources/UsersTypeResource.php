<?php

namespace App\Http\Resources;

use App\Models\UsersType;
use App\Repositories\UsersTypeRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersTypeResource extends JsonResource
{
    public function toArray($request)
    {
        $request = $this->resource;
        if (!is_a($request, UsersType::class)) {
            $repository = new UsersTypeRepository();
            $request = $repository->findById($request);
        }
        return [
            'id' => $request->id,
            'name' => $request->user_type
        ];
    }
}
