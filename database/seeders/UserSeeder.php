<?php

namespace Database\Seeders;

use App\Models\UsersType;
use App\Services\CreateUser;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        $typeAdmin = new UsersType();
        $typeAdmin->user_type = "Admin";
        $typeAdmin->save();

        $typeReceptionist = new UsersType();
        $typeReceptionist->user_type = "Receptionist";
        $typeReceptionist->save();

        $typeBaseUser = new UsersType();
        $typeBaseUser->user_type = "BaseUser";
        $typeBaseUser->save();

        $createUserService = app(CreateUser::class);
        $user1 = [
            'name' => 'Normal User',
            'password' => '102324iwebua',
            'email' => 'normaluser@iwebuanormaluser.com',
            'location' => 'Alicante',
            'country' => 'España',
            'address' => 'Avenida Nueva',
            'zip_code' => '03010',
            'phone_number' => '610081999',
            'type_id' => $typeBaseUser->id

        ];

        $createUserService($user1);
    }
}
