<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{

    protected $primaryKey = 'id_market';

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id_user');
    }


    public function city()
    {
        return $this->belongsTo('App\City', 'id_city', 'id_city');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_market', 'market_id', 'product_id')->withTimestamps();
    }


}
