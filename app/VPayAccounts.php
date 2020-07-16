<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VPayAccounts extends Model
{
    protected $fillable = [
        'store_id', 'a_payment_methods_id', 'attributes', 'title'
    ];

    // public function method()
    // {
    //         return $this->hasMany('App\Store');
    // }
}
