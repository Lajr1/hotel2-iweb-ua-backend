<?php

namespace App\Services;

use App\Models\RoomType;
use App\Models\Offer;
use App\Models\OfferRoomType;
use App\Repositories\OfferRepository;

class AddOfferToRoomType {
    public function __invoke($data)
    {
        return $this->addOfferToRoomType($data);
    }

    private function addOfferToRoomType($data)
    {
        $offerRepository = new OfferRepository();

        $roomType = $this->getRoomType($data['room_type']);
        $initialDate = $data['initial_date'];
        $endDate = $data['end_date'];
        $offer = $this->getOffer($data['offer']);

        if ($offerRepository->countOffersOfRoomType($roomType->id, $initialDate, $endDate) > 0) {
            throw new BaseException("No puede haber más de una oferta en un rango de fechas", 400);
        }

        $offerRoomType = new OfferRoomType();

        $offerRoomType->id_room_type = $roomType->id;
        $offerRoomType->initial_date = $initialDate;
        $offerRoomType->end_date = $endDate;
        $offerRoomType->id_offer = $offer->id;

        $offerRoomType->save();
    }

    /** @return RoomType */
    private function getRoomType(int $roomType)
    {
        $roomTypeRepository = new RoomTypeRepository();

        $roomType = $roomTypeRepository->findById($roomType);
        if (empty($roomType)) {
            throw new BaseException("Tipo de habitación no encontrado", 400);
        }
        return $roomType;
    }

    /** @return Offer */
    private function getOffer(int $offer)
    {
        $offerRepository = new OfferRepository();

        $offer = $offerRepository->findById($offer);
        if (empty($offer)) {
            throw new BaseException("Oferta no encontrada", 400);
        }
    }
}