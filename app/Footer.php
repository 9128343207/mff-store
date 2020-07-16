<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'address', 'support_number', 'support_mail', 'about'
    ];

    
}
