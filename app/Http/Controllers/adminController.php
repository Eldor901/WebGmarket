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
        $postProduct = Product::where('isApproved', '0')->paginate(30);

        if (Auth::user()->isAdmin == 1) {
            return view('admin.controlProduct')->withpostProduct($postProduct);
        }
        header('HTTP/1.0 404 Not Found');
        return view('errors.404');
    }

    public function controlMarkets(User $user)
    {
        $postMarket = User::all();
        if (Auth::user()->isAdmin == 1) {
            return view('admin.controlMarket')->withpostMarket($postMarket);
        }
        header('HTTP/1.0 404 Not Found');
        return view('errors.404');
    }

    public function destroyProduct(Request $request)
    {
        if($request->ajax()) {
            $post = Product::find($request->input('id'));
            $post->delete();
        }

    }

    public function destroyMarket(Request $request)
    {
        if ($request->ajax()) {
            $post = User::find($request->input('id'));
            $post->delete();
        }
    }


    public function UpdateApprovement(Request $request)
    {
        if ($request->ajax()) {
            $post = Product::find($request->input('id'));
            $post->isApproved = '1';
            $post->save();
        }
    }

    public function getAjaxContent()
    {
        $markets = User::all();
        echo json_encode($markets);
    }
}
