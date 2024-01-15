<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string user_type
 * 
 */
class UsersType extends Model
{
    public $timestamps = false;
    protected $table = 'users_type';


    public function getTypeName()
    {
        return $this->user_type;
    }
}
