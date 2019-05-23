<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id_product';
    protected $guarded = [];


    public function users()
    {
        return $this->belongsToMany('App\User', 'product_user', 'product_id', 'market_id');
    }
}
