<?php

namespace App\Repositories;

use App\Models\Room;

class RoomRepository
{
    /**
     * @return Room
     */
    public function findByRoomNumber($roomNumber)
    {
        try {
            $room = Room::query()->where('room_number', $roomNumber)->firstOrFail();
            return $room;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function findById($id)
    {
        try {
            $room = Room::query()->where('id', $id)->firstOrFail();
            return $room;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function getAllRoomsByType($roomType)
    {
        return Room::query()->where("room_type", $roomType)->get();
    }
}
