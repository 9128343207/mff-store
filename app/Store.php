<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Store extends Model
{
    protected $fillable = [
        'store_name', 'user_id', 'description',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function payAccounts()
    {
        return $this->belongsToMany('App\APaymentMethods', 'App\VPayAccounts')->withPivot('title', 'attributes');
    }

    public function orders()
    {
        return $this->hasMany('App\OrderProduct');
    }

    public function qoutes()
    {
        return $this->hasMany('App\quotes');
    }
}
