<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Repositories\UserRepository;
use App\Services\CreateReservation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{

    public function run()
    {
        $userRepository = new UserRepository();

        $user = $userRepository->findByEmail('normaluser@iwebuanormaluser.com');

        $data1 = [
            "user_email" => $user->email,
            "room_type" => 2,
            "check_in" => Carbon::createFromFormat('d-m-Y', '29-07-2023'),
            "check_out" => Carbon::createFromFormat('d-m-Y', '22-08-2023'),
            "services_list" => [1, 2, 3]
        ];
        $data2 = [
            "user_email" => $user->email,
            "room_type" => 2,
            "check_in" => Carbon::createFromFormat('d-m-Y', '23-08-2023'),
            "check_out" => Carbon::createFromFormat('d-m-Y', '30-08-2023'),
            "services_list" => [1, 2, 3]
        ];
        $serviceCreateReservation = app(CreateReservation::class);

        $serviceCreateReservation($data1);
        $serviceCreateReservation($data2);
    }
}
