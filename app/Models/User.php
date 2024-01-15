<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

/**
 * @property UsersType user_type
 * @property string name
 * @property string email
 * @property string password
 * @property Carbon deleted_at
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property string image_path
 * @property string location
 * @property string country
 * @property string address
 * @property int zip_code
 * @property int phone_number
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];



    // Todas las contraseñas si necesitan ser hasheadas, las hashea
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Hash::needsRehash($value) ? Hash::make($value) : $value
        );
    }
    public function type()
    {
        return $this->belongsTo(UsersType::class)->withTrashed();
    }

    public function setType(UsersType $type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        $this->type->getTypeName();
    }




    public function isAdmin()
    {
        $this->type->getTypeName() == "Admin";
    }
    public function isReceptionist()
    {
        $this->type->getTypeName() == "Receptionist";
    }
    public function isBaseUser()
    {
        $this->type->getTypeName() == "BaseUser";
    }
}
