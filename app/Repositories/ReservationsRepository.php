<?php

namespace App\Repositories;

use App\Models\Reservation;

class ReservationsRepository
{

    public function findReservadtionsForDateAndType($roomType, $check_in, $check_out)
    {
        $reservations = Reservation::query()->whereBetween('check_in', [$check_in, $check_out])
            ->orWhereBetween('check_out', [$check_in, $check_out])->where('room_type_id', $roomType)->get();
        return $reservations;
    }

    public function findById(int $id)
    {
        try {
            $type = Reservation::query()->where('id', $id)->firstOrFail();
            return $type;
        } catch (\Throwable $th) {
            return null;
        }
    }
}
