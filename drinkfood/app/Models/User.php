<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'fb_id',
        'username',
        'google_id',
        'fullname',
        'avatar',
        'url_key',
        'uid',
        'phone',
        'address',
        'birthday',
        'gender',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* Lien ket */
    public function category()
    {
        return $this->hasMany("App\Models\Category", "id_user_created", "id");
    }

    public function product()
    {
        return $this->hasMany("App\Models\Product", "id_user_created", "id");
    }

    public function order()
    {
        return $this->hasMany("App\Models\Order", "id_user_created", "id");
    }

    public function rating()
    {
        return $this->hasMany("App\Models\Rating", "id_user", "id");
    }
}
