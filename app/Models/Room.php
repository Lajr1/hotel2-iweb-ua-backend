<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property id room_type
 * @property string estado
 * @property string desc_estado 
 * @property int numero 
 * 
 * 
 */
class Room extends Model
{


    public function room_type()
    {
        return $this->belongsTo(RoomType::class, 'room_type');
    }
}
