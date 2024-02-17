<?php

namespace Database\Seeders;

use App\Services\AddOfferToRoomType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OfferRoomTypeSeeder extends Seeder
{

    public function run()
    {
        $data1 = [
            "offer" => 2,
            "room_type" => 2,
            "initial_date" => Carbon::createFromFormat('d-m-Y', '29-07-2024'),
            "end_date" => Carbon::createFromFormat('d-m-Y', '22-08-2024')
        ];
        $data2 = [
            "offer" => 1,
            "room_type" => 2,
            "initial_date" => Carbon::createFromFormat('d-m-Y', '23-08-2024'),
            "end_date" => Carbon::createFromFormat('d-m-Y', '30-08-2024')
        ];

        $serviceAddOfferToRoomType = app(AddOfferToRoomType::class);

        $serviceAddOfferToRoomType($data1);
        $serviceAddOfferToRoomType($data2);
    }
}
