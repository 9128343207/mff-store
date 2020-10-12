<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = ['title','parent_id', 'type'];


    /**

     * Get the index name for the model.

     *

     * @return string

    */

    public function childs() {

        return $this->hasMany('App\Category','parent_id','id') ;

    }

    public function products()
    {
    	return $this->belongsTo('App\Product' , 'category_id');
    }
}
