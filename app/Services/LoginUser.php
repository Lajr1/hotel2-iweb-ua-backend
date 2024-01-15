<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Passport;

class LoginUser
{

    public function __invoke($data)
    {

        return $this->loginUser($data);
    }

    private function loginUser($data)
    {
        $user = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
        $user = auth()->attempt($user);
        if ($user) {
            /** @var User */
            $user = auth()->user();
            $token = $user->createToken('auth')->accessToken;
            return [
                'user' => $user,
                'token' => $token
            ];
        }
    }
}
