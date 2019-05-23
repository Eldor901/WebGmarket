<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use DB;

class CityController extends Controller
{
    public function welcome()
    {
        return view('/welcome', ['cities' => City::all()]);
    }

}
