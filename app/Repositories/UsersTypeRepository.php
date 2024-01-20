<?php

namespace App\Repositories;

use App\Models\UsersType;

class UsersTypeRepository
{

    public function findByName(string $name)
    {
        try {
            $type = UsersType::query()->where('user_type', $name)->firstOrFail();
            return $type;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function findById(int $id)
    {
        try {
            $type = UsersType::query()->where('id', $id)->firstOrFail();
            return $type;
        } catch (\Throwable $th) {
            return null;
        }
    }
}
