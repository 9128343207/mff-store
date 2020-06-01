<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StorePayAccounts extends Model
{
    protected $fillable = [
        'store_id', 'a_payment_method_id', 'attributes', 'title'
    ];

    public function method()
    {
            return $this->hasMany('App\Store');
    }
}
