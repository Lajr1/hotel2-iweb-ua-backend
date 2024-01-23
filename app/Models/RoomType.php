<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property int people_number
 * @property int rooms_number
 * @property float price
 * 
 */
class RoomType extends Model
{
    protected $table = 'rooms_types';


    public function getTypeName()
    {
        return $this->user_type;
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reservation::class);
    }
}
