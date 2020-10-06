<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'store_id', 'name', 'category_id', 'bname', 'manufacturer', 's_desc', 'item_weight', 'weight_measure_unit',
        'volume', 'volume_measure_unit', 'warranty_desc', 'status', 'description', 'description2', 'description3',
        'price', 'currency', 'in_stock',

    ];

    public $popularMeasureQuantity = 1;

    public static function BasicColumn()
    {
        return [
            'id', 'name', 'bname', 's_desc', 'price', 'discount_price', 'tag', 'sold'
        ];
    }

    public  function scopeCategory($query, $key)
    {   
        return $query->where('category_id', $key);
    }

    public function scopePrice($query, $min, $max)
    {
        return $query->where('price', '>=', $min)
                     ->where('price', '<=', $max);
    }

    public function scopeTag($query, $keyword)
    {
        return $query->where('tag', '=', $keyword);
    }

    public function scopePopular($query)
    {
        return $query->where('sold', '>', $this->popularMeasureQuantity)
                     ->order('sold', 'desc');
    }

    public function scopeNewArrivals($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function scopeSimilar($query, $product)
    {
        $productTitle = explode(' ', $product->name, 4);
        return $query->where(function ($query) use ($productTitle) {
                        foreach ($productTitle as $value) {
                            $query->orWhere('name', 'like', '%'.$value.'%');
                        }
                    })
                    ->orWhere('name', 'like', '%'.$product->bname.'%')
                    ->orWhere('bname', 'like', '%'.$product->name.'%');
    }

    // public function scopeSimilarByCategory($query, $id)
    // {
    //     $productTitle = explode(' ', $product->name, 4);
    //     return $query->where(function ($query) use ($productTitle) {
    //                     foreach ($productTitle as $value) {
    //                         $query->orWhere('name', 'like', '%'.$value.'%');
    //                     }
    //                 })
    //                 ->orWhere('name', 'like', '%'.$product->bname.'%')
    //                 ->orWhere('bname', 'like', '%'.$product->name.'%');
    // }

    public function scopeSearch($query, $string)
    {
        $productTitle = str_split($string, 3);
        return $query->where(function ($query) use ($productTitle) {
                        foreach ($productTitle as $value) {
                            $query->orWhere('name', 'like', '%'.$value.'%');
                        }
                    })
                    ->orWhere(function ($query) use ($productTitle) {
                        foreach ($productTitle as $value) {
                            $query->orWhere('bname', 'like', '%'.$value.'%');
                        }
                    });
    }

    public function scopeTop3($query)
    {
        return $query->where('tag', 'top3')
                    ->orderBy('sort', 'asc')
                    ->limit(3);
    }

    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    public function productPhoto()
    {
        return $this->hasMany('App\ProductsPhoto');
    }

    public function category()
    {
        return $this->belongsTo('App\ProductCategory', 'product_category_id');
    }

    public function user()
    {
        return $this->belongsToMany('App\User')->using('App\CartM');
    }

    public function OrderProduct()
    {
        return $this->hasMany('App\OrderProduct');
    }
}
