<?php

namespace App\Services;

use App\Models\User;
use App\Models\UsersType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class CreateUser
{

    public function __invoke($data)
    {

        return $this->createUser($data);
    }

    private function createUser($data)
    {

        $user = new User();

        $user->name = $data['name'];
        $user->password = $data['password'];
        $user->email = $data['email'];
        $user->image_path = !empty($data['image_path']) ? $data['image_path'] : "baseImage.jpg";
        $user->location = $data['location'];
        $user->country = $data['country'];
        $user->address = $data['address'];
        $user->zip_code = $data['zip_code'];
        $user->phone_number = $data['phone_number'];
        $user->user_type = $data['type_id'];
        $user->save();
    }
}
