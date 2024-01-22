<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int id
 * @property string name
 * @property int people_number
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

    public function offers(): BelongsToMany
    {
        return $this->belongsToMany(Offer::class)->withPivot('initial_date', 'end_date')->withTimestamps();
    }
}
