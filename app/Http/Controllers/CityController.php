<?php

namespace App\Http\Controllers;

use App\City;
use App\Product;
use Illuminate\Http\Request;
use DB;

class CityController extends Controller
{
    public function welcome()
    {
        $name_city = '';
        return view('/welcome', ['cities' => City::all(), 'product' => Product::all(), 'name_city' => $name_city ]);
    }

    public function cityName($name_city)
    {
        return view('/welcome', ['cities' => City::all(), 'product' => Product::all(), 'name_city' => $name_city ]);
    }
}
