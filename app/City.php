<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $primaryKey = 'id_city';
    public function market()
    {
        return $this->hasMany('App\Market'); //market
    }
}
