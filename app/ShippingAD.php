<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAD extends Model
{
    protected $fillable = [
        'user_id', 'address',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
