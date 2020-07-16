<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductsPhoto extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
