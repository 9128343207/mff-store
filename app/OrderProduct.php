<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';

    protected $fillable = [
        'user_id', 'order_id', 'product_id', 'store_id', 'qty', 'billing_id', 'shipping_id', 'amount', 'tag', 'ad_status', 'vn_status'
    ];

    public function item()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }

    public function store()
    {
    	return $this->belongsTo('App\Store', 'store_id');
    }

    public function order()
    {
    	return $this->belongsTo('App\order', 'order_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
