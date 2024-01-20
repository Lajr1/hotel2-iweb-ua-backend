<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{

    public function findByEmail(string $email)
    {
        try {
            $user = User::query()->where('email', $email)->firstOrFail();
            return $user;
        } catch (\Throwable $th) {
            return null;
        }
    }


    public function getAllPaginated($page, $perPage, $filters = [])
    {

        $builder = User::query();

        if (!empty($filters["user_type"])) {
            $builder->where("user__type", $filters["user_type"]);
        }

        if (!empty($filters["location"])) {
            $builder->where("location", $filters["location"]);
        }

        if (!empty($filters["address"])) {
            $builder->where("address", $filters["address"]);
        }
        return $builder->orderBy('created_at', 'desc')->paginate($perPage, ["*"], 'page', $page);
    }
}
