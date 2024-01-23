<?php

namespace App\Services;

use App\Exceptions\BaseException;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
use App\Repositories\ReservationsRepository;
use App\Repositories\RoomRepository;
use App\Repositories\RoomTypeRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class CreateReservation
{

    public function __invoke($data)
    {

        return $this->createRoom($data);
    }

    private function createRoom($data)
    {

        if ($data['check_in'] > $data['check_out']) {
            throw new BaseException("Check in cant be greater than check out", 400);
        }
        $roomRepository = new RoomRepository();

        $user = $this->getUser($data['user_email']);

        $roomType = $this->getRoomType($data['room_type']);

        $reservations = $this->getReservations($roomType,  $data['check_in'], $data['check_out'])->pluck('room_id')->all();
        $roomsOfType = $roomRepository->getAllRoomsByType($roomType->id)->pluck("id")->all();

        $roomsId = array_diff($roomsOfType, $reservations);
        $room = $roomRepository->findById(array_values($roomsId)[0]);
        $serviceLsit = $data['services_list']; //To do

        $reservation = new Reservation();

        $reservation->user_id = $user->id;
        $reservation->room_type_id = $roomType->id;
        $reservation->room_id = $room->id;
        $reservation->room_price = $roomType->price;
        $reservation->services_price = 27;
        $reservation->total_price = $reservation->room_price + $reservation->services_price;
        $reservation->occupants = $roomType->people_number;
        $reservation->check_in = $data['check_in'];
        $reservation->check_out = $data['check_out'];
        $reservation->save();
    }
    /** @return User */

    private function getUser(string $email)
    {
        $userRepository = new UserRepository();
        $user = $userRepository->findByEmail($email);
        if (empty($user)) {
            throw new BaseException("Usuario no encontrado", 400);
        }

        return $user;
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

    private function getReservations(RoomType $roomType, $checkIn, $checkOut)
    {
        $reservationsRepository = new ReservationsRepository();

        $reservations = $reservationsRepository->findReservadtionsForDateAndType($roomType->id,  $checkIn, $checkOut);
        if ($reservations->count() >= $roomType->rooms_number) {
            throw new BaseException("Cant create reservation for this type of room on this dates", 400);
        }

        return $reservations;
    }
}
