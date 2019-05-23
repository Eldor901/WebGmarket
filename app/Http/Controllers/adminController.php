<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function admin()
    {

        return view('admin.admin');
    }

    public function controlProducts()
    {
        $postProduct = Product::all();

        if (Auth::user()->isAdmin == 1)
        {
            return view('admin.controlProduct')->withpostProduct($postProduct);
        }
        header('HTTP/1.0 404 Not Found');
        return view('errors.404');
    }

    public function controlMarkets(User $user)
    {
        $postMarket = User::all();
        if (Auth::user()->isAdmin == 1)
        {
            return view('admin.controlMarket')->withpostMarket($postMarket);
        }
        header('HTTP/1.0 404 Not Found');
        return view('errors.404');
    }

    public function destroyProduct($id_product)
    {
        $post = Product::find($id_product);
        $post -> delete();

        return redirect() -> route('controlProducts');
    }

    public function destroyMarket(Request $request)
    {
        if ($request->ajax())
        {
            $post = User::find($request->input('id'));
            $post->delete();
        }
        //return redirect() -> route('controlMarkets');
    }


    public  function UpdateApprovement($id_product)
    {
        $post = Product::find($id_product);

        $post->isApproved = '1';

        $post->save();
        return redirect() -> route('controlMarkets');
    }

}
