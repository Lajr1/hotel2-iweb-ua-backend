<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * @property Reservation $reservation_id
 * @property Service $service_id
 * @property Carbon $created_at   
 * @property Carbon $updated_at 
 * @property Carbon $deleted_at 
 */
class ServiceReservation extends Model
{
    protected $table = 'services_reservations';

    public function reservation_id()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    public function service_id()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
