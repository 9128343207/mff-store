<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quotes extends Model
{
    protected $fillable = [
        'product_id', 'qty', 'summary', 'status', 'store_id', 'user_id'
    ];

    public function Product()
    {
        return $this->hasMany('App\Product');
    }
}
