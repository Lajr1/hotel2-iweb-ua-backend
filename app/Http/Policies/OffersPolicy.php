<?php

namespace App\Http\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OffersPolicy
{
    use HandlesAuthorization;

    public function before(User $loggedUser)
    {
        if ($loggedUser->isAdmin()) {
            return true;
        }
    }

    public function store(User $loggedUser)
    {
        if (!$loggedUser->isAdmin()) {
            return false;
        }
    }

    public function update(User $loggedUser)
    {
        if (!$loggedUser->isAdmin()) {
            return false;
        }
    }

    public function destroy(User $loggedUser)
    {
        if (!$loggedUser->isAdmin()) {
            return false;
        }
    }
}
