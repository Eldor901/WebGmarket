<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function market()
    {
        return $this->hasMany('App\User'); //market
    }
}
