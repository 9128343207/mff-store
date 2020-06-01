<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    public function products()
    {
        return $this->hasMany('App\Product', 'product_category_id');
    }

    public function productphotoviaPcategory()
    {
        # code...
    }
}
