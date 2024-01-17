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
}
