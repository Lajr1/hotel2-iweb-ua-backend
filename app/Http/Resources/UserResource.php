<?php

namespace App\Http\Resources;

use App\Models\UsersType;
use App\Repositories\UsersTypeRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{


    public function toArray(Request $request)
    {
        /** @var User */
        $user = $this->resource;
        if (!is_a($user->user_type, UsersType::class)) {
            $repository = new UsersTypeRepository();
            $user->user_type = $repository->findById($user->user_type)->user_type;
        }
        $response = [
            "name" => $user->name,
            "email" => $user->email,
            "user_type" => $user->user_type,
            "phone_number" => $user->phone_number,
            "location" => $user->location,
            "country" => $user->country,
            "zip_code" => $user->zip_code,
            "address" => $user->address,
            "image_path" => $user->image_path,
            "created_at" => $user->created_at,
            "deleted_at" => $user->deleted_at
        ];

        return $response;
    }
}
