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
        $city = $request ->input('id_city');
        $search = $request->input('search');
        $products = Product::leftJoin('product_user', 'products.id_product', '=', 'product_user.product_id')
            ->leftJoin('users', 'product_user.market_id', '=', 'users.id_market')
            ->leftJoin('cities', 'users.id_city', '=', 'cities.id_city')
            ->where('cities.name_city', '=', $city)
            ->where('products.name_product', 'LIKE', '%' .$search. '%')

            ->groupBy('products.id_product')
            ->get();
        return view('product.search')->with('products', $products);
    }


    public function showProduct($product_id)
    {
        $post = Product::find($product_id);

        return view('product.showProduct')->withPost($post);
    }
}
