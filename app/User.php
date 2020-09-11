<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function store()
    {
        return $this->hasOne('App\Store');
    }

    public function products()
    {
        // return $this->hasMany('App\CartM');
        return $this->belongsToMany('App\Product', 'cart_m_s');
    }

    public function billing()
    {
        return $this->hasMany('App\Billing');
    }

    public function shipping()
    {
        return $this->hasMany('App\ShippingAD');
    }

    public function orders()
    {
        return $this->hasMany('App\order');
    }

    public function orderItem()
    {
        return $this->hasMany('App\OrderProduct');
    }
}
