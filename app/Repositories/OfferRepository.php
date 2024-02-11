<?php

namespace App\Repositories;

use App\Models\Offer;
use App\Models\OfferRoomType;
use Carbon\Carbon;

class OfferRepository
{
    public function findById(int $id)
    {
        try {
            $type = Offer::query()->where('id', $id)->firstOrFail();
            return $type;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function countOffersOfRoomType(int $room_type_id, Carbon $initial_date, Carbon $end_date)
    {
        $number_of_offers = OfferRoomType::query()->whereBetween('initial_date', [$initial_date, $end_date])
            ->orWhereBetween('end_date', [$initial_date, $end_date])->where('id_room_type', $room_type_id)->count();

        return $number_of_offers;
    }
}
