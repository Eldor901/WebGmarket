<?php

namespace App\Http\Controllers;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidationException;
use App\Market;
use App\User;

class RegisterMarket extends Controller
{
    public function register()
    {
        if (Auth()->User()->id_admin  == 0)
            return view('auth.MarketRegister', ['cities' => City::all()]);
        else
            return view('home ');
    }


    public function storeDetails(Request $request)
    {
 /*
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'id_city' => 'required',
            'phone'=>'required'
        ]);
*/

        $post = new market();

        $post -> name  = $request ->  name;
        $post -> description =  $request -> description;
        $post -> phone =  $request ->  number;
        $post -> id_city = $request-> id_city;

        $id = City::where('name', $post->id_city)->first()->id_city;

        $post->id_city = $id;
        $user_id = Auth()->User()->id_user;

        $post -> id_user = $user_id;

        $post -> save();

        return view('home');
    }

}


