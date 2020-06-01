<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CartM extends Pivot
{
    protected $table = 'cart_m_s';
    protected $fillable = [
        'user_id', 'product_id', 'quantity', 'attributes'
    ];

    protected $casts = [
        'attributes' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // public function product()
    // {
    //     return $this->hasMany('App\Product')->using('App\CartM');
    // }
}
