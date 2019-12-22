<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $primaryKey = 'id_currency';

    public function products()
    {
        return $this->hasMany('App\Product');
    }

}
