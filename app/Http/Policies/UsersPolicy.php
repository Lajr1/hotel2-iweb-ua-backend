<?php


namespace App\Http\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersPolicy
{
    use HandlesAuthorization;

    public function before(User $loggedUser)
    {
        if ($loggedUser->isAdmin()) {
            return true;
        }
    }
}
