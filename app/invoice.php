<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{

    protected $fillable = [
        'user_id', 'invoice_type', 'order_id', 'invoice_number', 'amount'
    ];

}
