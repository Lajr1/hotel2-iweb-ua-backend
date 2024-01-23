<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property User user_id
 * @property Room room_id
 * @property RoomType room_type_id
 * @property Carbon check_in
 * @property Carbon check_out 
 * @property float total_price
 * @property float room_price 
 * @property float services_price 
 * @property int occupants 
 * @property Carbon created_at   
 * @property Carbon updated_at 
 * @property Carbon deleted_at 
 */
class Reservation extends Model
{


    public function room_type_id()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function room_id()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function user_id()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
