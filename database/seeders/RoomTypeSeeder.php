<?php

namespace Database\Seeders;

use App\Models\RoomType;
use App\Services\CreateRoom;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{

    public function run()
    {
        $roomType1 = new RoomType();
        $roomType1->name = "Habitación suite";
        $roomType1->people_number = 2;
        $roomType1->rooms_number = 0;
        $roomType1->price = 80;
        $roomType1->save();

        $roomType2 = new RoomType();
        $roomType2->name = "Habitación suite";
        $roomType2->people_number = 3;
        $roomType2->rooms_number = 0;
        $roomType2->price = 100;
        $roomType2->save();

        $roomType3 = new RoomType();
        $roomType3->name = "Habitación vistas al mar";
        $roomType3->people_number = 2;
        $roomType3->rooms_number = 0;
        $roomType3->price = 40;
        $roomType3->save();

        $roomType4 = new RoomType();
        $roomType4->name = "Habitación básica";
        $roomType4->people_number = 2;
        $roomType4->rooms_number = 0;
        $roomType4->price = 20;
        $roomType4->save();

        $roomType4 = new RoomType();
        $roomType4->name = "Habitación básica";
        $roomType4->people_number = 4;
        $roomType4->rooms_number = 0;
        $roomType4->price = 40;
        $roomType4->save();

        $createRoomService = app(CreateRoom::class);

        $room1 = [
            'room_number' => 1004,
            'room_type' => $roomType2->id,
            'status' => 'Libre',
            'status_description' => '',
        ];

        $room2 = [
            'room_number' => 1005,
            'room_type' => $roomType2->id,
            'status' => 'Libre',
            'status_description' => '',
        ];
        $room3 = [
            'room_number' => 1006,
            'room_type' => $roomType2->id,
            'status' => 'Libre',
            'status_description' => '',
        ];
        $room4 = [
            'room_number' => 1007,
            'room_type' => $roomType2->id,
            'status' => 'Libre',
            'status_description' => '',
        ];
        $createRoomService($room2);
        $createRoomService($room1);
        $createRoomService($room3);
        $createRoomService($room4);
    }
}
