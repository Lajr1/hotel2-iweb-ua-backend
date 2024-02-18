<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository
{
    public function findById(int $id)
    {
        try {
            $type = Service::query()->where('id', $id)->firstOrFail();
            return $type;
        } catch (\Throwable $th) {
            return null;
        }
    }
}
