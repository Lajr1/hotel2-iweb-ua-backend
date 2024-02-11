<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Offer id_offer
 * @property RoomType id_room_type
 * @property Carbon initial_date
 * @property Carbon end_date 
 * @property Carbon created_at   
 * @property Carbon updated_at 
 * @property Carbon deleted_at 
 */
class OfferRoomType extends Model
{
    protected $table = 'offer_room_type_talbe';

    public function id_offer()
    {
        return $this->belongsTo(Offer::class, 'id_offer');
    }

    public function id_room_type()
    {
        return $this->belongsTo(RoomType::class, 'id_room_type');
    }
}
