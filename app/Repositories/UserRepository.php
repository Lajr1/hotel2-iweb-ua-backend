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
}
