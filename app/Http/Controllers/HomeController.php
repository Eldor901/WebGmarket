<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Controllers\Posts;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        if (Auth::user()->isAdmin == 1)
        {
            return view('admin.admin');
        }
        return view('home');
    }

    public function edit($id_market)
    {
        $id_market = User::find($id_market);
        return view('auth.editMarket')-> withPost($id_market);
    }

    public function update(Request $request, $id_market)
    {
        $post = User::find($id_market);

        $post->name_market = $request -> name_market;
        $post->description_market = $request -> description_market;
        $post->number_market = $request -> number_market;

        $post->save();

        return view('home');
    }
}
