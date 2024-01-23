<?php

namespace App\Repositories;

use App\Models\Reservation;
use App\Models\RoomType;

class RoomTypeRepository
{

    /**
     * @return RoomType
     */
    public function findById($id)
    {
        try {
            $roomType = RoomType::query()->where('id', $id)->firstOrFail();
            return $roomType;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function getAllPaginatedForSearch($page, $perPage, $filters = [])
    {
        $reservationsRepository = new ReservationsRepository();
        $builder = RoomType::query();
        if (!empty($filters["occupants"])) {
            $builder->where("people_number", $filters["occupants"]);
        }

        if (!empty($filters["room_type_name"])) {
            $builder->where("name", $filters["room_type_name"]);
        }
        $result = [];
        $builder->paginate($perPage, ["*"], 'page', $page)->map(function (RoomType $roomType) use (&$result, $reservationsRepository, $filters) {

            $reservations = $reservationsRepository->findReservadtionsForDateAndType($roomType->id,  $filters["check_in"], $filters["check_out"]);
            if ($reservations->count() >= $roomType->rooms_number) {
                $result[$roomType->id] = [
                    "id" => $roomType->id,
                    'name' => $roomType->name,
                    'occupants' => $roomType->people_number,
                    'price' => $roomType->price,
                    'status_for_date' => "Occuped",
                    "offers" => ["WIP"] // to do
                ];
            } else {
                $result[$roomType->id] = [
                    "id" => $roomType->id,
                    'name' => $roomType->name,
                    'occupants' => $roomType->people_number,
                    'price' => $roomType->price,
                    'status_for_date' => "Free",
                    "offers" => ["WIP"] // to do
                ];
            }
        });

        return $result;
    }

    public function getAllTypes()
    {
        $types = RoomType::query()->get();

        return $types;
    }
}
