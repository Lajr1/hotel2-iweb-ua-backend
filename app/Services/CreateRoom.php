<?php

namespace App\Services;

use App\Exceptions\BaseException;
use App\Models\Room;
use App\Models\User;
use App\Repositories\RoomRepository;
use App\Repositories\RoomTypeRepository;
use App\Repositories\UserRepository;

class CreateRoom
{

    public function __invoke($data)
    {

        return $this->createRoom($data);
    }

    private function createRoom($data)
    {
        $roomRepository = new RoomRepository();
        $roomTypeRepository = new RoomTypeRepository();

        $roomType = $roomTypeRepository->findById($data['room_type']);
        if ($roomRepository->findByRoomNumber($data['room_number']) || $roomType == null) {
            throw new BaseException("Error creando la habitación", 400);
        }
        $room = new Room();

        $room->room_number = $data['room_number'];
        $room->room_type = $data['room_type'];
        $room->status = $data['status'];
        $room->status_description = $data['status_description'];
        $room->save();

        $roomType->rooms_number++;

        $roomType->save();
    }
}
