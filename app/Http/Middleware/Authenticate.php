<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{

    protected function authenticate($request, array $guards)
    {

        $auth = parent::authenticate($request, $guards);
        if (!auth()->check()) {
            $this->unauthenticated($request, $guards);
        }

        return $auth;
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request)
    {
        return '';
    }
}
