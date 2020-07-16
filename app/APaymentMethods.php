<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class APaymentMethods extends Model
{
    public function VPayAccount()
    {
        return $this->hasMany('App\VPayAccounts');
    }
}
