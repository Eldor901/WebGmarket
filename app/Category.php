<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $primaryKey = 'id_category';

    public function products()
    {
        return $this->belongsToMany('App\Product','category_product', 'id_category', 'id_product');
    }
}
