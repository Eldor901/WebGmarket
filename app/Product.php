<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id_product';
    protected $guarded = [];


    public function users()
    {
        return $this->belongsToMany('App\Market', 'product_market', 'product_id', 'market_id');
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency', 'id_currency', 'id_currency');
    }


    public function category()
    {
        return $this->belongsToMany('App\Category', 'category_product', 'id_product', 'id_category');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'id_product', 'id_product');
    }

}
