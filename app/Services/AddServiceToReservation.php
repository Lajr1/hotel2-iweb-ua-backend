<?php

namespace App\Services;

use App\Exceptions\BaseException;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\ServiceReservation;
use App\Repositories\ReservationsRepository;
use App\Repositories\ServiceRepository;

class AddServiceToReservation {
    public function __invoke($data)
    {
        return $this->addServiceToReservation($data);
    }

    private function addServiceToReservation($data)
    {
        $reservation = $this->getReservation($data['reservation']);
        $service = $this->getService($data['service']);

        $serviceReservation = new ServiceReservation();

        $serviceReservation->reservation_id = $reservation->id;
        $serviceReservation->service_id = $service->id;

        $serviceReservation->save();
    }

    /** @return Reservation */
    private function getReservation(int $reservation)
    {
        $reservationRepository = new ReservationsRepository();

        $reservation = $reservationRepository->findById($reservation);
        if (empty($reservation)) {
            throw new BaseException("Reserva no encontrada", 400);
        }
        return $reservation;
    }

    /** @return Service */
    private function getService(int $service)
    {
        $serviceRepository = new ServiceRepository();

        $service = $serviceRepository->findById($service);
        if (empty($service)) {
            throw new BaseException("Servicio no encontrado", 400);
        }
        return $service;
    }
}