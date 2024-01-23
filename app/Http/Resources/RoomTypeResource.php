<?php

namespace App\Http\Resources;

use App\Models\RoomType;
use App\Repositories\UsersTypeRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomTypeResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var RoomType */
        $request = $this->resource;
        return [
            'id' => $request->id,
            'name' => $request->name,
            'people_number' => $request->people_number,
            'price' => $request->price,
        ];
    }
}
