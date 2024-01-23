<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property RoomType room_type
 * @property string status
 * @property string status_description 
 * @property int room_number 
 * 
 * 
 */
class Room extends Model
{


    public function room_type()
    {
        return $this->belongsTo(RoomType::class, 'room_type');
    }

    public function reservas()
    {
        return $this->hasMany(Reservation::class);
    }
}
