<?php

namespace App\Http\Controllers;

use App\Market;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $post = Market::findOrFail($id_market);

        return view('auth.editMarket')-> withPost($post);
    }

    public function update(Request $request, $id_market)
    {
        $post = Market::findOrFail($id_market);

        $post -> name = $request -> name;
        $post -> description = $request-> description;
        $post -> phone = $request-> number;
        ($post->user()->count()) ?
            $post->user()->update($request->only('email')):
            $post->user()->create($request->only('email'));

        $post->save();

        return view('home')->with('succes', 'Market has been edited');
    }
}
