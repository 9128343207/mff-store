<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{

    protected $fillable = [
        'user_id', 'product_id', 'status', 'invoice_id', 'store_id', 'shipping_a_d_id', 'billing_id', 'a_payment_methods_id', 'order_number', 'qty', 'order_type', 'note'
    ];

    public function products()
    {
    	return $this->belongstoMany('App\Product')->withPivot('qty', 'amount');
    }

    public function invoice()
    {
    	return $this->hasOne('App\invoice');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function Method()
    {
        return $this->belongsTo('App\APaymentMethods', 'a_payment_methods_id');
    }

    public function oitems()
    {
        return $this->hasMany('App\OrderProduct');
    }
}
