<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'order_product_id', 'status', 'store'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
