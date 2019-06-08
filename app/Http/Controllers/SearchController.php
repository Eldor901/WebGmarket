<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\City;
use DB;

class SearchController extends Controller
{
    public function  search(Request $request)
    {
        $city = $request ->input('city');
        $search = $request->input('search');

        $name_city = $city;
        $search = ( mb_substr($search, 0, -2));



        $products = Product::leftJoin('product_user', 'products.id_product', '=', 'product_user.product_id')
            ->leftJoin('users', 'product_user.market_id', '=', 'users.id_market')
            ->leftJoin('cities', 'users.id_city', '=', 'cities.id_city')
            ->where('cities.name_city', '=', $city)
            ->where('products.name_product', 'LIKE', '%' .$search. '__%')
            ->where('products.isApproved', '=', '1')
            ->groupBy('products.id_product')
            ->paginate(28);


        return view('product.search',['products' => $products, 'name_city' => $name_city]);
    }

    public function showProduct($product_id)
    {
        $post = Product::find($product_id);

        return view('product.showProduct')->withPost($post);
    }


    public function searchUserPosts(Request $request)
    {
        $search = $request->input('searchUserPosts');
        $search = (mb_substr($search, 0, -1));

        if ($search != ' ')
        {
            $postProduct = auth()->user()->products()->Where('name_product', 'LIKE', '%' . $search . '%')->paginate(30);

        }
        else
        {
            $postProduct = auth()->user()->products()->paginate(30);
        }

        $products = auth()->user()->products()->get();

        return view('product.pages.index',['postProduct' => $postProduct,'product' => $products]);
    }
}
